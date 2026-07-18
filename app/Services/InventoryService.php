<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\InventoryTransaction;
use App\Models\InventoryAdjustment;
use App\Models\PurchaseOrder;
use App\Models\StockReceipt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventoryService
{
    /**
     * Record an inventory transaction atomically.
     * This is the ONLY method that should modify quantity_on_hand.
     */
    public function recordTransaction(
        Inventory $inventory,
        string $transactionType,
        string $referenceType,
        int $referenceId,
        int $quantityChange,
        int $performedBy,
        ?string $notes = null
    ): InventoryTransaction {
        $quantityBefore = (int) ($inventory->quantity_on_hand ?? 0);
        $quantityAfter = $quantityBefore + $quantityChange;

        // Direct DB update — bypassing fillable protection intentionally
        DB::table('inventories')
            ->where('id', $inventory->id)
            ->update(['quantity_on_hand' => $quantityAfter, 'updated_at' => now()]);

        $inventory->refresh();

        return InventoryTransaction::create([
            'inventory_id' => $inventory->id,
            'transaction_type' => $transactionType,
            'reference_type' => $referenceType,
            'reference_id' => $referenceId,
            'quantity_change' => $quantityChange,
            'quantity_before' => $quantityBefore,
            'quantity_after' => $quantityAfter,
            'performed_by' => $performedBy,
            'notes' => $notes,
        ]);
    }

    /**
     * Receive stock from an approved Purchase Order.
     */
    public function receiveStock(
        PurchaseOrder $purchaseOrder,
        array $receivedItems, // [{po_item_id, good_qty, damaged_qty, notes}]
        int $receivedBy,
        ?string $receiptNotes = null
    ): StockReceipt {
        return DB::transaction(function () use ($purchaseOrder, $receivedItems, $receivedBy, $receiptNotes) {
            // 1. Create Stock Receipt
            $receipt = StockReceipt::create([
                'purchase_order_id' => $purchaseOrder->id,
                'received_by' => $receivedBy,
                'receipt_number' => 'REC-' . date('Y') . '-' . strtoupper(Str::random(5)),
                'status' => 'confirmed',
                'notes' => $receiptNotes,
                'received_at' => now(),
            ]);

            $allFullyReceived = true;

            // 2. Process each line item
            foreach ($receivedItems as $item) {
                $poItem = $purchaseOrder->items()->findOrFail($item['po_item_id']);
                $goodQty = (int) $item['good_qty'];
                $damagedQty = (int) ($item['damaged_qty'] ?? 0);

                // Create receipt item
                $receipt->items()->create([
                    'purchase_order_item_id' => $poItem->id,
                    'product_variant_id' => $poItem->product_variant_id,
                    'quantity_expected' => $poItem->quantity_ordered,
                    'quantity_received_good' => $goodQty,
                    'quantity_received_damaged' => $damagedQty,
                    'notes' => $item['notes'] ?? null,
                ]);

                // Update PO item received quantity
                $poItem->increment('quantity_received', $goodQty);

                // Check if fully received
                if ($poItem->quantity_received < $poItem->quantity_ordered) {
                    $allFullyReceived = false;
                }

                // 3. Record inventory transaction for good quantity
                if ($goodQty > 0) {
                    $inventory = Inventory::firstOrCreate(
                        [
                            'shop_id' => $purchaseOrder->shop_id,
                            'product_variant_id' => $poItem->product_variant_id,
                        ],
                        [
                            'quantity_on_hand' => 0,
                            'quantity_reserved' => 0,
                            'reorder_point' => 10,
                            'reorder_quantity' => 50,
                        ]
                    );

                    $this->recordTransaction(
                        $inventory,
                        'PURCHASE_RECEIPT',
                        'stock_receipt',
                        $receipt->id,
                        $goodQty,
                        $receivedBy,
                        "Received {$goodQty} units from PO {$purchaseOrder->po_number}"
                    );
                }
            }

            // 4. Update PO status
            $newStatus = $allFullyReceived ? 'fully_received' : 'partially_received';
            $oldStatus = $purchaseOrder->status;
            $purchaseOrder->update(['status' => $newStatus]);

            // Log status change
            $purchaseOrder->statusLogs()->create([
                'changed_by' => $receivedBy,
                'from_status' => $oldStatus,
                'to_status' => $newStatus,
                'notes' => "Stock receipt {$receipt->receipt_number} processed.",
            ]);

            return $receipt;
        });
    }

    /**
     * Apply an approved manual adjustment to inventory.
     */
    public function applyAdjustment(InventoryAdjustment $adjustment, int $reviewerId, ?string $reviewNotes = null): void
    {
        DB::transaction(function () use ($adjustment, $reviewerId, $reviewNotes) {
            $adjustment->update([
                'status' => 'approved',
                'reviewed_by' => $reviewerId,
                'reviewed_at' => now(),
                'review_notes' => $reviewNotes,
            ]);

            $transactionType = $adjustment->quantity_to_adjust > 0
                ? 'ADJUSTMENT_INCREASE'
                : 'ADJUSTMENT_DECREASE';

            $this->recordTransaction(
                $adjustment->inventory,
                $transactionType,
                'inventory_adjustment',
                $adjustment->id,
                $adjustment->quantity_to_adjust,
                $reviewerId,
                "Manual adjustment: {$adjustment->adjustment_type} — {$adjustment->reason}"
            );
        });
    }
}
