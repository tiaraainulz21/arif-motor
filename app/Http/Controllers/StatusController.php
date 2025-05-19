<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueueService;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        // Ambil data dari database sesuai user yang login
        $statusPesanan = QueueService::where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('status_customer', compact('statusPesanan'));
    }
}
