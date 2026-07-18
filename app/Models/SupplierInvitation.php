<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierInvitation extends Model
{
    protected $fillable = [
        'shop_id',
        'invited_email',
        'supplier_id',
        'token',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function supplier()
    {
        return $this->belongsTo(SupplierProfile::class, 'supplier_id');
    }
}
