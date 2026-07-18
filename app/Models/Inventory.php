<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    // SECURITY: quantity_on_hand is NOT fillable.
    // It must only be modified through InventoryService::recordTransaction().
    protected $fillable = [
        'shop_id',
        'product_variant_id',
        'quantity_reserved',
        'reorder_point',
        'reorder_quantity',
        'warehouse_location',
        'last_counted_at',
    ];

    protected $casts = [
        'last_counted_at' => 'datetime',
    ];

    protected $appends = ['quantity_available'];

    public function getQuantityAvailableAttribute()
    {
        return $this->quantity_on_hand - $this->quantity_reserved;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function transactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }

    public function adjustments()
    {
        return $this->hasMany(InventoryAdjustment::class);
    }
}
