<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'status',
        'grand_total',
        'product_count',
        'is_paid',
        'payment_method',
        'shipping_fullname',
        'shipping_address',
        'shipping_city',
        'shipping_postcode',
        'shipping_phone',
        'notes',
        'billing_fullname',
        'billing_address',
        'billing_city',
        'billing_postcode',
        'billing_phone',
        'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }
}
