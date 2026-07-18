<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Inventory;
use App\Models\InventoryAdjustment;
use App\Models\PurchaseOrder;
use App\Services\InventoryService;

class InventoryController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    /**
     * Inventory Dashboard — stock levels table.
     */
    public function index(Request $request)
    {
        $shop = $request->user()->shop;

        $inventories = Inventory::with(['productVariant.product'])
            ->where('shop_id', $shop->id)
            ->get();

        $adjustments = InventoryAdjustment::with(['inventory.productVariant.product', 'requester'])
            ->whereHas('inventory', fn($q) => $q->where('shop_id', $shop->id))
            ->where('status', 'pending')
            ->latest()
            ->get();

        return Inertia::render('Seller/Inventory/Index', [
            'inventories' => $inventories,
            'pendingAdjustments' => $adjustments,
        ]);
    }

    /**
     * Show form to receive stock from an approved PO.
     */
    public function receiveStockForm(Request $request)
    {
        $shop = $request->user()->shop;

        $approvedPOs = PurchaseOrder::with(['supplier.user', 'items.productVariant.product'])
            ->where('shop_id', $shop->id)
            ->whereIn('status', ['approved', 'partially_received'])
            ->get();

        return Inertia::render('Seller/Inventory/ReceiveStock', [
            'approvedPOs' => $approvedPOs,
        ]);
    }

    /**
     * Process a stock receipt.
     */
    public function receiveStock(Request $request)
    {
        $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'items' => 'required|array|min:1',
            'items.*.po_item_id' => 'required|exists:purchase_order_items,id',
            'items.*.good_qty' => 'required|integer|min:0',
            'items.*.damaged_qty' => 'nullable|integer|min:0',
        ]);

        $po = PurchaseOrder::findOrFail($request->purchase_order_id);

        $this->inventoryService->receiveStock(
            $po,
            $request->items,
            $request->user()->id,
            $request->notes
        );

        return redirect()->route('seller.inventory.index')
            ->with('success', 'Stock received successfully! Inventory has been updated.');
    }

    /**
     * Transaction log for a specific inventory record.
     */
    public function transactionLog(Request $request, Inventory $inventory)
    {
        $shop = $request->user()->shop;

        if ($inventory->shop_id !== $shop->id) {
            abort(403);
        }

        $inventory->load(['productVariant.product', 'transactions' => fn($q) => $q->latest()->take(50)]);
        $inventory->transactions->load('performer');

        return Inertia::render('Seller/Inventory/TransactionLog', [
            'inventory' => $inventory,
        ]);
    }

    /**
     * Create a manual adjustment request.
     */
    public function storeAdjustment(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'adjustment_type' => 'required|in:SHORTAGE,DAMAGE,EXPIRY,COUNT_CORRECTION,SUPPLIER_RETURN,OTHER',
            'quantity_to_adjust' => 'required|integer|not_in:0',
            'reason' => 'required|string|min:10',
        ]);

        $inventory = Inventory::findOrFail($request->inventory_id);
        $shop = $request->user()->shop;

        if ($inventory->shop_id !== $shop->id) {
            abort(403);
        }

        InventoryAdjustment::create([
            'inventory_id' => $request->inventory_id,
            'requested_by' => $request->user()->id,
            'adjustment_type' => $request->adjustment_type,
            'quantity_to_adjust' => $request->quantity_to_adjust,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Adjustment request submitted for review.');
    }

    /**
     * Approve a pending manual adjustment.
     */
    public function approveAdjustment(Request $request, InventoryAdjustment $adjustment)
    {
        $shop = $request->user()->shop;

        if ($adjustment->inventory->shop_id !== $shop->id) {
            abort(403);
        }

        $this->inventoryService->applyAdjustment(
            $adjustment,
            $request->user()->id,
            $request->review_notes
        );

        return back()->with('success', 'Adjustment approved and inventory updated.');
    }

    /**
     * Reject a pending manual adjustment.
     */
    public function rejectAdjustment(Request $request, InventoryAdjustment $adjustment)
    {
        $shop = $request->user()->shop;

        if ($adjustment->inventory->shop_id !== $shop->id) {
            abort(403);
        }

        $adjustment->update([
            'status' => 'rejected',
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
            'review_notes' => $request->review_notes,
        ]);

        return back()->with('success', 'Adjustment rejected.');
    }
}
