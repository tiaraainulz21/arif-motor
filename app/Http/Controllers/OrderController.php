<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function summary(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $user = Auth::user();

    $customer = Customer::where('user_id', $user->id)->first();
    if (!$customer) {
        return back()->with('error', 'Data customer tidak ditemukan.');
    }

    $addresses = $customer->addresses;

    // Tangkap alamat terpilih dari query string
    $selectedAddressId = $request->query('selected_address_id');
    if ($selectedAddressId) {
        $selectedAddress = $addresses->where('id', $selectedAddressId)->first();
    } else {
        $selectedAddress = $addresses->firstWhere('is_default', true) ?? $addresses->first();
    }

    // ** Tambahkan: set session checkout_qty dari query param 'qty' jika ada **
    if ($request->has('qty')) {
        session(['checkout_qty' => (int) $request->query('qty')]);
    }

    $quantity = session('checkout_qty', 1);
    session()->forget('checkout_qty');

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
                'address' => $selectedAddress->address ?? $customer->address
            ],
            'addresses' => $addresses,
            'selectedAddress' => $selectedAddress,
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
            'recipient_name' => 'required|string|max:255',
            'shipping_address_id' => 'required|exists:customer_addresses,id',
        ]);

        DB::beginTransaction();

        try {
            $customer = Customer::where('user_id', Auth::id())->first();
            if (!$customer) {
                return back()->with('error', 'Data customer tidak ditemukan.');
            }

            $product = Product::findOrFail($request->product_id);

            if ($product->stock < $request->qty) {
                return back()->with('error', 'Stok produk tidak cukup.');
            }

            $address = CustomerAddress::findOrFail($request->shipping_address_id);

            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'customer_id' => $customer->id,
                'recipient_name' => $request->recipient_name,
                'shipping_address' => $address->address,
                'transaction_code' => 'TRX-' . now()->timestamp,
                'date' => now()->toDateString(),
                'total' => $request->total,
                'payment_type' => $request->payment_method,
                'status' => 'Diproses',
            ]);

            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'sub_total' => $request->price * $request->qty,
            ]);

            $product->stock -= $request->qty;
            $product->save();

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    public function struk()
    {
        $transactions = Transaction::with(['details.product'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('struk_pesanan_customer', compact('transactions'));
    }

    public function detail($id)
    {
        $transaction = Transaction::with(['details.product', 'shippingAddress'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('pesanan_customer', compact('transaction'));
    }

    public function setQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        session(['checkout_qty' => $request->quantity]);

        return response()->json(['status' => 'success']);
    }
}