<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
