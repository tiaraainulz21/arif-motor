<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminPesananController extends Controller
{
    // 🛠️ PERBAIKAN
        public function index()
            {
                $transactions = Transaction::with('user', 'customer', 'details.product') // ❌ Hapus 'shippingAddress'
                    ->orderBy('created_at', 'desc')
                    ->get();

                return view('admin.pesanan.index', compact('transactions'));
            }


    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|string|in:Diproses,Dikemas,Diterima',
    ]);

    Transaction::where('id', $id)->update([
        'status' => $validated['status'],
    ]);

    return redirect()->back()->with('success', 'Status berhasil diubah.');
}


}
