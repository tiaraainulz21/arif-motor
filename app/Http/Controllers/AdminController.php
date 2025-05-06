<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Notification;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCustomers = Customer::count(); 
        $totalProducts = Product::count();
        $totalNotifications = Notification::count();
        $totalServices = \App\Models\Service::count(); 


        return view('adminpage.content.dashboard.index', compact('totalCustomers',  'totalProducts', 'totalServices', 'totalNotifications'));
    }
}
