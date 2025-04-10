<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
       // Ambil data dari URL
        $productName = $request->query('product_name');
        $quantity = $request->query('quantity', 1);
        $price = $request->query('price', 0);
        $totalPrice = $quantity * $price;

    // Simpan dalam array untuk dikirim ke tampilan
    $cart = [
        'name' => $productName,
        'quantity' => $quantity,
        'price' => $price,
        'total' => $totalPrice
    ];

    return view('cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]); // Hapus produk dari keranjang
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function checkout()
    {
        Session::forget('cart'); // Kosongkan keranjang setelah checkout
        return redirect()->route('cart.index')->with('success', 'Pembelian berhasil!');
    }
}
