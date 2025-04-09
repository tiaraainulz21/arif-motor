<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = [
            'username' => 'Vivi',
            'name' => 'Vivi Lestari',
            'address' => 'Blok Kali Kulon, Desa Druntenwetan',
            'phone' => '081280823794',
            'gender' => 'Perempuan',
            'email' => 'vlestari924@gmail.com',
        ];

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = [
            'username' => 'Vivi',
            'name' => 'Vivi Lestari',
            'address' => 'Blok Kali Kulon, Desa Druntenwetan',
            'phone' => '081280823794',
            'gender' => 'Perempuan',
            'email' => 'vlestari924@gmail.com',
        ];

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Simulasi penyimpanan (nanti bisa disimpan ke database)
        $data = $request->all();

        // Redirect kembali ke halaman profil setelah update
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
