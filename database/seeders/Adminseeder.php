<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'customer'];

        foreach ($roles as $item) {
            Role::firstOrCreate([
                'name' => $item,
                'guard_name' => 'web' // pastikan guard_name sesuai
            ]);
        }

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('1234'),
            ]
        );
        $admin->assignRole('admin');

        $customer = User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'username' => 'customer',
                'password' => Hash::make('1234'),
            ]
        );
        $customer->assignRole('customer');
    }
}
