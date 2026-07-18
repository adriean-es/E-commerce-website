<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductApprovalLog;
use Illuminate\Support\Facades\DB;

class CatalogApprovalController extends Controller
{
    public function index()
    {
        // Fetch only products that need review
        $pendingProducts = Product::where('status', 'pending_review')
            ->with(['shop', 'category', 'variants'])
            ->latest()
            ->paginate(15);

        return Inertia::render('Admin/Catalog/Approvals', [
            'products' => $pendingProducts
        ]);
    }

    public function approve(Request $request, Product $product)
    {
        DB::transaction(function () use ($request, $product) {
            $product->update([
                'status' => 'approved',
                'approved_by' => $request->user()->id,
                'approved_at' => now(),
            ]);

            ProductApprovalLog::create([
                'product_id' => $product->id,
                'admin_id' => $request->user()->id,
                'action' => 'approved',
                'notes' => 'Product approved by Admin.',
            ]);
        });

        return back()->with('success', 'Product approved and is now live!');
    }

    public function reject(Request $request, Product $product)
    {
        $request->validate([
            'reason' => 'required|string|max:1000'
        ]);

        DB::transaction(function () use ($request, $product) {
            $product->update([
                'status' => 'rejected',
                'rejection_reason' => $request->reason,
            ]);

            ProductApprovalLog::create([
                'product_id' => $product->id,
                'admin_id' => $request->user()->id,
                'action' => 'rejected',
                'notes' => $request->reason,
            ]);
        });

        return back()->with('success', 'Product rejected.');
    }
}
