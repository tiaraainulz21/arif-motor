<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'shipping_address_id', 
        'shipping_address', 
        'recipient_name', 
        'transaction_code',
        'date',
        'total',
        'status',
        'payment_type',
    ];

    public function details()
    {
        return $this->hasMany(DetailTransaction::class, 'transaction_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(CustomerAddress::class, 'shipping_address_id');
    }

}
