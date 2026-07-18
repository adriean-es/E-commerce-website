<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PurchaseOrder;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $supplier = $request->user()->supplierProfile;

        if (!$supplier) {
            abort(403, 'Supplier profile not found.');
        }

        $pendingPOs = PurchaseOrder::where('supplier_id', $supplier->id)
            ->where('status', 'sent')
            ->count();

        $approvedPOs = PurchaseOrder::where('supplier_id', $supplier->id)
            ->where('status', 'approved')
            ->count();

        // Get recent POs across all sellers
        $recentPOs = PurchaseOrder::with('shop')
            ->where('supplier_id', $supplier->id)
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('Supplier/Dashboard', [
            'stats' => [
                'pending' => $pendingPOs,
                'approved' => $approvedPOs,
            ],
            'recentPOs' => $recentPOs,
        ]);
    }
}
