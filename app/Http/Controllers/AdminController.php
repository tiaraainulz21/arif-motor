<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Notification;
use App\Models\Customer;
use App\Models\QueueService;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Hitung semua total yang dibutuhkan untuk dashboard
        $totalCustomers = Customer::count(); 
        $totalProducts = Product::count();
        $totalNotifications = Notification::count();
        $totalServices = QueueService::count(); 
        $totalTransactions = Transaction::count();
        $totalPendapatan = Transaction::sum('total'); 

        // Kirim semua data ke view dashboard
        return view('adminpage.content.dashboard.index', compact(
            'totalCustomers',
            'totalProducts',
            'totalServices',
            'totalNotifications',
            'totalTransactions',
            'totalPendapatan'
        ));
    }
}
