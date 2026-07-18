<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    public $timestamps = false; // No timestamps on this pivot-like table

    protected $fillable = [
        'purchase_order_id',
        'product_variant_id',
        'quantity_ordered',
        'unit_cost',
        'total_cost',
        'quantity_received',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
