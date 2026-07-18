<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderStatusLog extends Model
{
    const UPDATED_AT = null; // This audit table is append-only

    protected $fillable = [
        'purchase_order_id',
        'changed_by',
        'from_status',
        'to_status',
        'notes',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function changer()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
