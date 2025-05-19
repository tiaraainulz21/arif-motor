<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class StrukPesananController extends Controller
{
    // Menampilkan daftar transaksi (struk-pesanan)
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->orderBy('date', 'desc')->get();

        return view('struk_pesanan_customer', compact('transactions'));
    }

    // Menampilkan detail pesanan dari 1 transaksi
    public function show($id)
    {
        $transaction = Transaction::with('details.product')->findOrFail($id);
        $details = $transaction->details;

        return view('pesanan_customer', compact('transaction', 'details'));
    }

}
