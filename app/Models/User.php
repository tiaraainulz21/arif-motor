<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
<<<<<<< HEAD
=======
    /** @use HasFactory<\Database\Factories\UserFactory> */
>>>>>>> 1aa5d3e5841672a1f9dace5cb7639ebab0cf37b4
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Customer
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    // Relasi ke Notification (satu user bisa punya banyak notifikasi)
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
