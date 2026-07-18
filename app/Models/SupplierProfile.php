<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'contact_person',
        'phone',
        'tax_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'seller_suppliers', 'supplier_id', 'shop_id')
            ->withPivot('status', 'notes', 'invited_at', 'accepted_at');
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'supplier_id');
    }
}
