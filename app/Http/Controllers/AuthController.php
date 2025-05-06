<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    if (Auth::attempt($credentials)) {
        if(Auth::user()->getRoleNames()->first() == 'customer')
            return redirect()->intended('beranda');
        else
            return redirect()->route('dashboard');
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
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ]);
        
        DB::beginTransaction();
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ])->assignRole('customer');        

        $customer = Customer::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'address' => $request->alamat,
            'phone' => $request->no_hp,
            'gender' => $request->jenis_kelamin,
        ]);   
        
        DB::commit();


        Auth::login($customer);
        return redirect('/login');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
     
}