<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['admin', 'customer'];
        foreach ($role as $item)
            Role::create(['name'=>$item]);

        User::create([
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('1234'),
            
        ])->assignRole('admin');
        User::create([
            'email' => 'customer@example.com',
            'username' => 'customer',
            'password' => Hash::make('1234'),
            
        ])->assignRole('customer');
    }
}
