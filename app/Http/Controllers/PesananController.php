<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        // Contoh data pesanan (biasanya diambil dari database)
        $pesanan = [
            [
                'nama' => 'Denso Busi Motor',
                'gambar' => 'busi.jpg', // Simpan gambar di public/images/
                'harga' => 50000,
                'jumlah' => 2,
                'total' => 100000
            ],
            [
                'nama' => 'Pompa Oli Honda CB150',
                'gambar' => 'pompa oli.jpg',
                'harga' => 200000,
                'jumlah' => 1,
                'total' => 200000
            ]
        ];

        return view('pesanan_customer', compact('pesanan'));
    }
}
