<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Admin: Tampilkan semua produk
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('brand', 'like', "%$search%")
                    ->orWhere('type', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->orWhere('stock', 'like', "%$search%")
                    ->orWhere('price', 'like', "%$search%");
            });
        })->get();

        return view('admin.products.index', compact('products', 'search'));
    }


    // Admin: Form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Admin: Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            // Simpan file ke direktori public/images
            $request->file('image')->move(public_path('images'), $filename);

            // Simpan path publik ke database
            $validated['image'] = 'images/' . $filename;
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Admin: Form edit produk (tambahan agar lengkap)
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Admin: Update produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            // Simpan file ke direktori public/images
            $request->file('image')->move(public_path('images'), $filename);

            // Simpan path publik ke database
            $validated['image'] = 'images/' . $filename;
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Admin: Hapus produk
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Customer: Tampilkan semua produk di beranda
    public function showAllForCustomer()
    {
        $products = Product::all();
        return view('beranda_customer', compact('products'));
    }

    // Customer: Search produk
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
                            ->orWhere('brand', 'like', '%' . $query . '%')
                            ->orWhere('type', 'like', '%' . $query . '%')
                            ->get();

        return view('search', compact('products', 'query'));
    }
}