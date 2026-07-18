<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $supplier = $request->user()->supplierProfile;

        $purchaseOrders = PurchaseOrder::with(['shop', 'creator'])
            ->where('supplier_id', $supplier->id)
            ->latest()
            ->get();

        return Inertia::render('Supplier/PurchaseOrders/Index', [
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    public function show(Request $request, PurchaseOrder $purchaseOrder)
    {
        $supplier = $request->user()->supplierProfile;

        // Ensure PO belongs to this supplier
        if ($purchaseOrder->supplier_id !== $supplier->id) {
            abort(403, 'Unauthorized.');
        }

        $purchaseOrder->load(['shop', 'creator', 'items.productVariant.product', 'statusLogs.changer']);

        return Inertia::render('Supplier/PurchaseOrders/Show', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $supplier = $request->user()->supplierProfile;

        if ($purchaseOrder->supplier_id !== $supplier->id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:acknowledged,approved,cancelled',
            'supplier_notes' => 'nullable|string',
        ]);

        $oldStatus = $purchaseOrder->status;
        $newStatus = $request->status;

        $purchaseOrder->update([
            'status' => $newStatus,
            'supplier_notes' => $request->supplier_notes,
            'approved_at' => $newStatus === 'approved' ? now() : $purchaseOrder->approved_at,
        ]);

        // Log status change
        $purchaseOrder->statusLogs()->create([
            'changed_by' => $request->user()->id,
            'from_status' => $oldStatus,
            'to_status' => $newStatus,
            'notes' => 'Supplier changed status to ' . $newStatus,
        ]);

        return back()->with('success', 'Purchase Order updated successfully!');
    }
}
