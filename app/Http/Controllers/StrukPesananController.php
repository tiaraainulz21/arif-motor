<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukPesananController extends Controller
{
    public function index()
    {
        $struk = [
            [
                'id' => 1,
                'kode' => 'TRANS001',
                'tanggal' => '2025-04-05',
                'total' => 100000,
                'status' => 'Dikirim',
            ],
            [
                'id' => 2,
                'kode' => 'TRANS002',
                'tanggal' => '2025-04-06',
                'total' => 200000,
                'status' => 'Selesai',
            ],
        ];

        return view('struk_pesanan_customer', compact('struk'));
    }

    public function show($id)
    {
        // Contoh redirect ke halaman detail
        return "Menampilkan detail struk pesanan dengan ID: $id";
    }
}

