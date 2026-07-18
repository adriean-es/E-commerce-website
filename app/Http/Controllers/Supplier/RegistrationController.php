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

        $invitation = SupplierInvitation::where('token', $request->token)
            ->where('status', 'pending')
            ->firstOrFail();

        DB::transaction(function () use ($request, $invitation) {
            // 1. Create User
            $user = User::create([
                'name' => $request->name,
                'email' => $invitation->invited_email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(), // Auto-verify
            ]);

            $user->assignRole('supplier');

            // 2. Create Supplier Profile
            $supplier = SupplierProfile::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'status' => 'active',
            ]);

            // 3. Link Seller to Supplier
            $invitation->shop->suppliers()->attach($supplier->id, [
                'status' => 'active',
                'invited_at' => $invitation->created_at,
                'accepted_at' => now(),
            ]);

            // 4. Update Invitation status
            $invitation->update([
                'status' => 'accepted',
                'supplier_id' => $supplier->id,
            ]);
        });

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }
}
