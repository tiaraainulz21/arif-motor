<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class OrderController extends Controller
{
    public function summary($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        $customer = Customer::where('user_id', $user->id)->first();
        if (!$customer) {
            return back()->with('error', 'Data customer tidak ditemukan.');
        }

        $quantity = 1;
        $subtotal = $product->price * $quantity;
        $shipping = 15000;
        $service_fee = 5000;
        $total = $subtotal + $shipping + $service_fee;

        return view('order-summary', [
            'order' => [
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'qty' => $quantity
                ],
                'customer' => [
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'address' => $customer->address
                ],
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'service_fee' => $service_fee,
                'total' => $total
            ]
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'price' => 'required|numeric',
        'total' => 'required|numeric',
        'payment_method' => 'required|string',
        'shipping' => 'required|numeric',
        'service_fee' => 'required|numeric',
    ]);

    DB::beginTransaction();

    try {
        $customer = Customer::where('user_id', Auth::id())->first();
        if (!$customer) {
            return back()->with('error', 'Data customer tidak ditemukan.');
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'customer_id' => $customer->id,
            'transaction_code' => 'TRX-' . now()->timestamp,
            'date' => now()->toDateString(),
            'total' => $request->total,
            'payment_type' => $request->payment_method,
            'status' => 'pending',
        ]);

        DetailTransaction::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'sub_total' => $request->price * $request->qty,
        ]);

        DB::commit();

        // ✅ Redirect ke struk-pesanan
        return redirect()->route('transactions.index')->with('success', 'Pesanan berhasil dibuat!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
    }
}


    public function struk()
    {
        $transactions = Transaction::with('details.product')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('struk_pesanan_customer', compact('transactions'));
    }

    public function detail($id)
    {
        $transaction = Transaction::with('details.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('pesanan_customer', compact('transaction'));
    }
}
