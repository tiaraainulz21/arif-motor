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
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Item berhasil dihapus']);
        }

        return redirect()->back()->with('success', 'Item dihapus');
    }

    public function checkout(Request $request)
{
    $selectedItems = $request->input('checkout_items', []);
    $quantities = $request->input('qty_hidden', []);

    if (count($selectedItems) !== 1) {
        return redirect()->back()->with('error', 'Mohon pilih hanya satu produk untuk checkout.');
    }

    $cartItem = Cart::findOrFail($selectedItems[0]);
    $productId = $cartItem->product_id;

    // Ambil qty dari form
    $qty = isset($quantities[$cartItem->id]) ? intval($quantities[$cartItem->id]) : $cartItem->qty;

    // Simpan qty di session untuk ditampilkan di halaman ringkasan
    session(['checkout_qty' => $qty]);

    return redirect()->route('order.summary', ['id' => $productId]);
}

    
}