<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockReceiptItem extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'stock_receipt_id',
        'purchase_order_item_id',
        'product_variant_id',
        'quantity_expected',
        'quantity_received_good',
        'quantity_received_damaged',
        'notes',
    ];

    public function stockReceipt()
    {
        return $this->belongsTo(StockReceipt::class);
    }

    public function purchaseOrderItem()
    {
        return $this->belongsTo(PurchaseOrderItem::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
