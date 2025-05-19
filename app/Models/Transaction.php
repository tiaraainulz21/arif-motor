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
}
