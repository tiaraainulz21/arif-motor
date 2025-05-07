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
    public function orderNow(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cod,transfer_bank,dana',
        ]);
    
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;
        $service_fee = 1000;
        $shipping_fee = 0; // sementara gratis ongkir
    
        // Hitung total
        $product_total = $product->price * $quantity;
        $grand_total = $product_total + $shipping_fee + $service_fee;
    
        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'telepon' => Auth::user()->phone,
            'alamat' => Auth::user()->alamat,
            'subtotal_produk' => $product_total,
            'subtotal_pengiriman' => $shipping_fee,
            'biaya_layanan' => $service_fee,
            'total' => $grand_total,
            'metode_pembayaran' => $request->payment_method,
            'status' => 'pending',
        ]);
    
        // Simpan item yang dibeli
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'nama_produk' => $product->name,
            'harga' => $product->price,
            'jumlah' => $quantity,
        ]);
    
        return redirect()->route('checkout.sukses', $order->id)
                         ->with('success', 'Pesanan berhasil dibuat!');
    }
}
