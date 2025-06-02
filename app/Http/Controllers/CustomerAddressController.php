<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    public function index(Request $request)
    {
        // Ambil customer yang login
        $customer = Customer::where('user_id', Auth::id())->firstOrFail();
        $addresses = $customer->addresses()->get();

        // Ambil parameter return_to dari query string, supaya bisa diteruskan ke view
        $returnTo = $request->input('return_to', route('addresses.index'));

        // Kirim data addresses dan return_to ke view
        return view('addresses.index', compact('addresses', 'returnTo'));
    }

    public function create(Request $request)
    {
        // Ambil parameter return_to dari query string supaya form create juga tahu kemana harus kembali
        $returnTo = $request->input('return_to', route('addresses.index'));

        return view('addresses.create', compact('returnTo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $customer = Customer::where('user_id', Auth::id())->firstOrFail();

        // Jika alamat baru ini default, reset alamat default yang lain
        if ($request->has('is_default')) {
            CustomerAddress::where('customer_id', $customer->id)->update(['is_default' => false]);
        }

        CustomerAddress::create([
            'customer_id' => $customer->id,
            'recipient_name' => $request->recipient_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_default' => $request->has('is_default'),
        ]);

        // Ambil return_to dari form input (hidden) atau default ke index alamat
        $returnTo = $request->input('return_to', route('addresses.index'));

        return redirect($returnTo)->with('success', 'Alamat berhasil ditambahkan.');
    }
}
