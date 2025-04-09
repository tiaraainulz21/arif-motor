<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Data produk contoh (seharusnya dari database)
        $products = [
            ['name' => 'Denso Busi Motor', 'price' => 50000, 'image' => asset('images/busi.jpg')],
            ['name' => 'Radiator Assy Honda Vario 160', 'price' => 300000, 'image' => asset('images/Radiator.jpg')],
            ['name' => 'Pompa Oli Honda CB150', 'price' => 200000, 'image' => asset('images/pompa oli.jpg')],
            ['name' => 'Shockbreaker Motor Honda Beat', 'price' => 250000, 'image' => asset('images/shockbreaker.jpg')],
            ['name' => 'Ban Motor FDR', 'price' => 150000, 'image' => asset('images/bann.jpg')],
            ['name' => 'Oli Enduro Matic', 'price' => 60000, 'image' => asset('images/oli.png')]
        ];

        // Filter produk berdasarkan pencarian
        $filteredProducts = array_filter($products, function ($product) use ($query) {
            return stripos($product['name'], $query) !== false;
        });

        return view('products.search', ['products' => $filteredProducts, 'query' => $query]);
    }

    private $products = [
        'busi' => [
            'name' => 'Busi Denso U22 Honda Supra X Grand Revo',
            'brand' => 'Honda',
            'type' => 'Busi U22',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 50000,
            'image' => 'images/busi.jpg',
        ],
        'radiator' => [
            'name' => 'Radiator Assy Honda Vario 160',
            'brand' => 'Honda',
            'type' => 'Radiator Assy Vario 160 (19010-K1Z-T01)',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 300000,
            'image' => 'images/Radiator.jpg',
        ],
        'ban' => [
            'name' => 'Ban Motor FDR',
            'brand' => 'FDR',
            'type' => 'Genzi',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 150000,
            'image' => 'images/bann.jpg',
        ],
        'oli' => [
            'name' => 'Oli Enduro Matic',
            'brand' => 'Pertamina',
            'type' => 'Enduro Matic 10W-30',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 60000,
            'image' => 'images/oli.png',
        ],
        'pompa oli' => [
            'name' => 'Pompa Oli Honda CB150',
            'brand' => 'Honda',
            'type' => 'Pompa Oli CB150',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 200000,
            'image' => 'images/pompa oli.jpg',
        ],
        'shockbreaker' => [
            'name' => 'Shockbreaker Motor Honda Beat',
            'brand' => 'Honda',
            'type' => 'Shockbreaker OEM Honda Beat',
            'condition' => '100% Baru',
            'stock' => 'Ready Stok',
            'price' => 250000,
            'image' => 'images/shockbreaker.jpg',
        ],
    ];

    public function showByName($name)
    {
        // Jika produk tidak ditemukan, tampilkan 404
        if (!isset($this->products[$name])) {
            abort(404);
        }

        return view('products.show', ['product' => $this->products[$name]]);
    }
}

    