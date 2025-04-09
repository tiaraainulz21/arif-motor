<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $fillable = [
        'no_antrean', 'nama', 'alamat', 'no_hp', 'varian_motor', 'jenis_service', 'tanggal_registrasi', 'jam_kedatangan'
    ];
}
