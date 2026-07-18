<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Inventories — one record per variant per shop
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade');

            $table->integer('quantity_on_hand')->default(0);
            $table->integer('quantity_reserved')->default(0);
            // quantity_available is computed in the model as (on_hand - reserved)

            $table->integer('reorder_point')->nullable();
            $table->integer('reorder_quantity')->nullable();
            $table->string('warehouse_location', 100)->nullable();
            $table->timestamp('last_counted_at')->nullable();

            $table->unique(['shop_id', 'product_variant_id']);
            $table->timestamps();
        });

        // 2. Inventory Transactions — Immutable Ledger (append-only)
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');

            $table->enum('transaction_type', [
                'PURCHASE_RECEIPT',
                'SALE_DEDUCTION',
                'SALE_RETURN',
                'ADJUSTMENT_INCREASE',
                'ADJUSTMENT_DECREASE',
                'OPENING_STOCK',
            ]);

            $table->string('reference_type', 100); // polymorphic: stock_receipt, order, adjustment
            $table->unsignedBigInteger('reference_id');

            $table->integer('quantity_change'); // signed: +50 or -3
            $table->integer('quantity_before');
            $table->integer('quantity_after');

            $table->foreignId('performed_by')->constrained('users')->onDelete('restrict');
            $table->text('notes')->nullable();

            $table->timestamp('created_at'); // NO updated_at — immutable
        });

        // 3. Stock Receipts — goods received against POs
        Schema::create('stock_receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade');
            $table->foreignId('received_by')->constrained('users')->onDelete('restrict');
            $table->string('receipt_number', 50)->unique();
            $table->enum('status', ['draft', 'confirmed'])->default('confirmed');
            $table->text('notes')->nullable();
            $table->timestamp('received_at');
            $table->timestamps();
        });

        // 4. Stock Receipt Items — per-line detail
        Schema::create('stock_receipt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_receipt_id')->constrained('stock_receipts')->onDelete('cascade');
            $table->foreignId('purchase_order_item_id')->constrained('purchase_order_items')->onDelete('cascade');
            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade');

            $table->unsignedInteger('quantity_expected');
            $table->unsignedInteger('quantity_received_good');
            $table->unsignedInteger('quantity_received_damaged')->default(0);
            $table->text('notes')->nullable();
        });

        // 5. Inventory Adjustments — manual corrections with approval
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');
            $table->foreignId('requested_by')->constrained('users')->onDelete('restrict');
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->onDelete('set null');

            $table->enum('adjustment_type', [
                'SHORTAGE', 'DAMAGE', 'EXPIRY',
                'COUNT_CORRECTION', 'SUPPLIER_RETURN', 'OTHER',
            ]);

            $table->integer('quantity_to_adjust'); // signed
            $table->text('reason');
            $table->json('evidence_paths')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('reviewed_at')->nullable();
            $table->text('review_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_adjustments');
        Schema::dropIfExists('stock_receipt_items');
        Schema::dropIfExists('stock_receipts');
        Schema::dropIfExists('inventory_transactions');
        Schema::dropIfExists('inventories');
    }
};
