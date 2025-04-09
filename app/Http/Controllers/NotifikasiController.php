<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        // Contoh data notifikasi (biasanya diambil dari database)
        $notifikasi = [
            [
                'pesan' => 'Anda sudah membeli produk sparepart',
                'tanggal' => '13-03-2025'
            ],
            [
                'pesan' => 'Anda sudah memesan layanan service',
                'tanggal' => '14-03-2025'
            ]
        ];

        return view('notifikasi_customer', compact('notifikasi'));
    }
}
