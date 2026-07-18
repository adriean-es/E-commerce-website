<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\SupplierProfile;
use App\Models\SupplierInvitation;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->shop;

        // Active relationships
        $suppliers = $shop->suppliers()->get();

        // Pending invitations
        $invitations = SupplierInvitation::where('shop_id', $shop->id)
            ->where('status', 'pending')
            ->get();

        return Inertia::render('Seller/Suppliers/Index', [
            'suppliers' => $suppliers,
            'invitations' => $invitations,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $shop = $request->user()->shop;

        // Check if invitation already exists
        $existing = SupplierInvitation::where('shop_id', $shop->id)
            ->where('invited_email', $request->email)
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            return back()->with('error', 'An invitation has already been sent to this email.');
        }

        // Create Invitation
        SupplierInvitation::create([
            'shop_id' => $shop->id,
            'invited_email' => $request->email,
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ]);

        // Note: In a real app, we would dispatch an Email Job here.
        // For testing, we will just grab the token from the database directly.

        return back()->with('success', 'Supplier invitation sent successfully!');
    }
}
