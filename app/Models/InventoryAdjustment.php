<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryAdjustment extends Model
{
    protected $fillable = [
        'inventory_id',
        'requested_by',
        'reviewed_by',
        'adjustment_type',
        'quantity_to_adjust',
        'reason',
        'evidence_paths',
        'status',
        'reviewed_at',
        'review_notes',
    ];

    protected $casts = [
        'evidence_paths' => 'array',
        'reviewed_at' => 'datetime',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
