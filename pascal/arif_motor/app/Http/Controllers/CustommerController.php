<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustommerController extends Controller
{
    public function index() {
    $customers = Customer::all();
    $users = User::all(); // tambahkan ini

        return view('customers.index', compact('customers', 'users'));
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {   
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|numeric',
            'gender' => 'required|string',
        ]);

        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'user_id' => Auth::id(), // otomatis isi dengan user yang sedang login


        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function edit(Customer $customer) {
        $users = User::all();
        return view('customers.edit', compact('customer', 'users'));
    }

    public function update(Request $request, Customer $customer) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
        ]);

        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
