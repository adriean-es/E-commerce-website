<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'shop_id',
        'supplier_id',
        'created_by',
        'po_number',
        'status',
        'subtotal',
        'shipping_cost',
        'tax_amount',
        'total_amount',
        'expected_delivery_date',
        'delivery_address',
        'notes',
        'supplier_notes',
        'approved_at',
    ];

    protected $casts = [
        'expected_delivery_date' => 'date',
        'approved_at' => 'datetime',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function supplier()
    {
        return $this->belongsTo(SupplierProfile::class, 'supplier_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function statusLogs()
    {
        return $this->hasMany(PurchaseOrderStatusLog::class);
    }
}
