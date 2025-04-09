<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login_customer');
    }
    
    public function beranda() {
        return view('beranda_customer');
    }

    public function login(Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::guard('customer')->attempt($credentials)) {
        return redirect()->intended('beranda');
    }

    return back()->withErrors(['username' => 'Username atau password salah.']);
}    
    
    public function showRegister() {
        return view('auth.register_customer');
    }
    
    public function register(Request $request) { 
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:customer,email',
            'username' => 'required|unique:customer,username',
            'password' => 'required|min:6'
        ]);
        
        $customer = Customer::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);        


        Auth::login($customer);
        return redirect('/login');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
     // Menampilkan halaman profil customer
     public function profile()
     {
         $customer = Auth::user(); // Ambil data user yang sedang login
         return view('profil_customer', compact('customer'));
     }
 
     // Menampilkan halaman edit profil
     public function editProfile()
     {
         $customer = Auth::user();
         return view('edit_profil_customer', compact('customer'));
     }
 
     // Memproses update profil
     public function updateProfile(Request $request)
     {
         $customer = Auth::user(); // Ambil customer yang sedang login
 
         $request->validate([
             'name' => 'required|string|max:255',
             'alamat' => 'required|string',
             'no_hp' => 'required|string',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'email' => 'required|email|unique:customers,email,' . $customer->id,
         ]);
 
         return redirect()->route('customer.profile')->with('success', 'Profil berhasil diperbarui!');
     }
}