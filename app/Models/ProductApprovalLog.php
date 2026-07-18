<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductApprovalLog extends Model
{
    public const UPDATED_AT = null; // Append-only audit table, no updated_at

    protected $fillable = ['product_id', 'admin_id', 'action', 'notes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
