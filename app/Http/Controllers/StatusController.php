<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        // Contoh data status (biasanya diambil dari database)
        $statusPesanan = [
            [
                'nama' => 'Tiara Ainul Zannah',
                'jenis_service' => 'Ganti Oli',
                'resume' => 'Lihat Resume',
                'status' => 'Selesai'
            ],
            [
                'nama' => 'Tiara Ainul Zannah',
                'jenis_service' => 'Service Rutin',
                'resume' => 'Lihat Resume',
                'status' => 'Diproses'
            ]
        ];

        return view('status_customer', compact('statusPesanan'));
    }
}
