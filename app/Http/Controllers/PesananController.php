<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $details = DetailTransaction::with('product', 'transaction')
            ->whereHas('transaction', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return view('pesanan_customer', compact('details'));
    }
}
