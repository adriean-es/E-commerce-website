<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false; // We didn't add timestamps in the migration
    protected $fillable = ['name', 'display_name', 'input_type'];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
