<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCustomers = Customer::count(); // Hitung total customer
        $totalProducts = Product::count();

        return view('adminpage.content.dashboard.index', compact('totalCustomers',  'totalProducts'));
    }
}
