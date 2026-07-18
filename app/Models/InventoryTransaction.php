<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    const UPDATED_AT = null; // Immutable ledger — append-only

    protected $fillable = [
        'inventory_id',
        'transaction_type',
        'reference_type',
        'reference_id',
        'quantity_change',
        'quantity_before',
        'quantity_after',
        'performed_by',
        'notes',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function performer()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
