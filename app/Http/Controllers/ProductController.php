<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $data['query'] = $request->input('query');

        $data['products'] = Product::where('name', 'LIKE', '%'.$data['query'].'%')->get();

        return view('products.search', $data);
    }
    public function showByName($id)
    {
        // Jika produk tidak ditemukan, tampilkan 404
       $data['product'] = Product::find($id);

        return view('products.show', $data);
    }
}

    