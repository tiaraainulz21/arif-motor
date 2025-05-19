<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'name', 'phone', 'address', 
        'quantity', 'subtotal', 'shipping', 'service_fee', 'total'
    ];

    // Relasi dengan User (Customer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
