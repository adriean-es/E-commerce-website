<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierInvitation;
use App\Models\User;
use App\Models\SupplierProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->query('token');

        $invitation = SupplierInvitation::where('token', $token)
            ->where('status', 'pending')
            ->where('expires_at', '>', now())
            ->first();

        if (!$invitation) {
            abort(403, 'Invalid or expired invitation token.');
        }

        $userExists = User::where('email', $invitation->invited_email)->exists();

        return Inertia::render('Supplier/Auth/Register', [
            'email' => $invitation->invited_email,
            'token' => $token,
            'userExists' => $userExists
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:supplier_invitations,token',
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $invitation = SupplierInvitation::where('token', $request->token)->first();

        if (!$invitation || $invitation->status !== 'pending') {
            return redirect()->route('login')->with('error', 'This invitation has already been processed or is invalid.');
        }

        DB::transaction(function () use ($request, $invitation) {
            // 1. Create or Update User
            $user = User::firstOrCreate(
                ['email' => $invitation->invited_email],
                [
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                    'email_verified_at' => now(),
                ]
            );

            // If user already existed, we still want to update their password to what they just entered
            if (!$user->wasRecentlyCreated) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            $user->assignRole('supplier');

            // 2. Create or Update Supplier Profile
            $supplier = SupplierProfile::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'company_name' => $request->company_name,
                    'status' => 'active',
                ]
            );

            // 3. Link Seller to Supplier
            // Check if pivot already exists to avoid duplicate entries
            $pivotExists = DB::table('seller_suppliers')
                ->where('shop_id', $invitation->shop->id)
                ->where('supplier_id', $supplier->id)
                ->exists();

            if (!$pivotExists) {
                $invitation->shop->suppliers()->attach($supplier->id, [
                    'status' => 'active',
                    'invited_at' => $invitation->created_at,
                    'accepted_at' => now(),
                ]);
            }

            // 4. Update Invitation status
            $invitation->update([
                'status' => 'accepted',
                'supplier_id' => $supplier->id,
            ]);
        });

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
}
