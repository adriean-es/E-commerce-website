<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Purchase Orders
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade'); // Purchasing seller
            $table->foreignId('supplier_id')->constrained('supplier_profiles')->onDelete('restrict');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict'); // Staff who created PO

            $table->string('po_number', 50)->unique();
            $table->enum('status', [
                'draft',
                'sent',
                'acknowledged',
                'approved',
                'partially_received',
                'fully_received',
                'cancelled'
            ])->default('draft');

            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);

            $table->date('expected_delivery_date')->nullable();
            $table->text('delivery_address');
            $table->text('notes')->nullable();
            $table->text('supplier_notes')->nullable();

            $table->timestamp('approved_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // 2. Purchase Order Items
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade');
            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('restrict');

            $table->unsignedInteger('quantity_ordered');
            $table->decimal('unit_cost', 10, 2);
            $table->decimal('total_cost', 12, 2);

            $table->unsignedInteger('quantity_received')->default(0);
        });

        // 3. Purchase Order Status Logs (Immutable Audit Trail)
        Schema::create('purchase_order_status_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade');
            $table->foreignId('changed_by')->constrained('users')->onDelete('restrict');

            $table->string('from_status', 50);
            $table->string('to_status', 50);
            $table->text('notes')->nullable();

            $table->timestamp('created_at'); // Immutable, no updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_order_status_logs');
        Schema::dropIfExists('purchase_order_items');
        Schema::dropIfExists('purchase_orders');
    }
};
