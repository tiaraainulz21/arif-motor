<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function summary()
    {
        // Contoh data pesanan (bisa diambil dari database)
        $order = [
            'customer' => [
                'name' => 'Vivi Lestari',
                'phone' => '081280823794',
                'address' => 'Blok Kali Kulon, Desa Drunten Wetan, RT 014/RW 007, Kec.Gabuswetan, Kab.Indramayu, Kode Pos 45263'
            ],
            'product' => [
                'name' => 'Radiator Assy Honda Vario 160',
                'price' => 300000,
                'quantity' => 1,
                'image' => 'images/Radiator.jpg',
            ],
            'subtotal' => 300000,
            'shipping' => 0,
            'service_fee' => 1000,
            'total' => 301000
        ];

        return view('order-summary', compact('order'));
    }
}
