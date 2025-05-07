<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $data['cart']   = Cart::with(['product'])->where('user_id', Auth::user()->id)->get();

        return view('cart.index', $data);
    }
    
    public function add(Request $request, $id)
    {
        Cart::create([
            'user_id'       => Auth::user()->id,
            'product_id'    => $id,
            'qty'           => $request->qty
        ]);

       return redirect()->route('cart.index');
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
