<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call(AdminSeeder::class);

        $products = [
            [
                'name' => 'Busi Denso U22 Honda Supra X Grand Revo',
                'brand' => 'Honda',
                'type' => 'Busi U22',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 50000,
                'image' => 'images/busi.jpg',
            ],
            [
                'name' => 'Radiator Assy Honda Vario 160',
                'brand' => 'Honda',
                'type' => 'Radiator Assy Vario 160 (19010-K1Z-T01)',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 300000,
                'image' => 'images/Radiator.jpg',
            ],
            [
                'name' => 'Ban Motor FDR',
                'brand' => 'FDR',
                'type' => 'Genzi',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 150000,
                'image' => 'images/bann.jpg',
            ],
            [
                'name' => 'Oli Enduro Matic',
                'brand' => 'Pertamina',
                'type' => 'Enduro Matic 10W-30',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 60000,
                'image' => 'images/oli.png',
            ],
            [
                'name' => 'Pompa Oli Honda CB150',
                'brand' => 'Honda',
                'type' => 'Pompa Oli CB150',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 200000,
                'image' => 'images/pompa oli.jpg',
            ],
            [
                'name' => 'Shockbreaker Motor Honda Beat',
                'brand' => 'Honda',
                'type' => 'Shockbreaker OEM Honda Beat',
                'description' => '100% Baru',
                'stock' => 10,
                'price' => 250000,
                'image' => 'images/shockbreaker.jpg',
            ],
        ];
    

        foreach($products as $product){
            Product::create([
                'name'  => $product['name'],
                'brand' => $product['brand'],
                'type'  => $product['type'],
                'description'   => $product['description'],
                'stock' => $product['stock'],
                'price' => $product['price'],
                'image' => $product['image'],
            ]);
        }

    }
}
