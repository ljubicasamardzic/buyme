<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_zip',
        'paid_at',
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
