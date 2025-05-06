<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Ambil user yang login
        $customer = Customer::where('user_id', $user->id)->first(); // Ambil data customer

        return view('profile.show', compact('user', 'customer'));
    }

    public function edit()
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        return view('profile.edit', compact('user', 'customer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        // Update data customer
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
