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
            // Simpan ke storage/app/public/images
            $path = $request->file('image')->store('images', 'public');
        
            // Simpan path-nya (misalnya: images/nama.jpg)
            $validated['image'] = $path;
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
        // Hapus gambar lama dari storage/public
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Simpan gambar baru ke storage/app/public/images
        $path = $request->file('image')->store('images', 'public');
        $validated['image'] = $path;
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

    // Customer: Tampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
        return view('products.show', compact('product')); // Mengirim data produk ke tampilan
    }


    // Customer: Search produk
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

    

        $products = Product::where('name', 'like', '%' . $query . '%')
                            ->orWhere('brand', 'like', '%' . $query . '%')
                            ->orWhere('type', 'like', '%' . $query . '%')
                            ->get();

        return view('products.search', compact('products', 'query'));
    }
}

