<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StrukPesananController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\ServiceStatusController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PaymentController;


Route::get('/admin', function(){
    return view('admin.index');
})->name('Kelola Layanan Service');


// Redirect ke login kalau akses root
Route::get('/', function(){
    return redirect()->route('login');
});

Route::post('/payment/token', [App\Http\Controllers\PaymentController::class, 'getSnapToken'])->name('payment.token');
Route::get('/pembayaran/{transaction}', [PaymentController::class, 'show'])->name('payment.show');




// Beranda & Search (Customer)
Route::get('/beranda', [ProductController::class, 'showAllForCustomer'])->name('beranda');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::post('/produk/{id}/set-quantity', [OrderController::class, 'setQuantity'])->name('produk.setQuantity');


// RINGKASAN & ORDER STORE (Customer)
Route::get('/produk/{id}/ringkasan', [OrderController::class, 'summary'])->name('order.summary');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/struk', [StrukPesananController::class, 'index'])->name('struk_pesanan.index');

// Cart dan Checkout
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register_post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pesanan dan Layanan


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Pesanan dan Layanan




Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');


Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
Route::get('/transactions', [StrukPesananController::class, 'index'])->name('transactions.index');
Route::get('/struk-pesanan/{id}', [StrukPesananController::class, 'show'])->name('transactions.detail');

Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');
Route::delete('/notifikasi/{notifikasi}', [NotifikasiController::class, 'customerDestroy'])->name('notifikasi.customer.destroy');
Route::get('/status', [StatusController::class, 'index'])->name('status');

// Service Kendaraan
Route::get('/service', [ServiceController::class, 'showForm'])->name('service.form');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/resume/{id}', [ServiceController::class, 'showResume'])->name('service.resume');
Route::get('/resume-service/{id}/pdf', [ServiceController::class, 'generatePDF']);


// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Admin Area
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Customer Management
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Product Management (Admin)
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Notifikasi Management (Admin)
    Route::get('/notifikasi', [NotifikasiController::class, 'adminIndex'])->name('notifikasi.index');
    Route::get('/admin/notifikasi/create', [NotifikasiController::class, 'create'])->name('notifikasi.create');
    Route::post('/admin/notifikasi', [NotifikasiController::class, 'store'])->name('notifikasi.store');
    Route::get('/admin/notifikasi/{id}/edit', [NotifikasiController::class, 'edit'])->name('notifikasi.edit');
    Route::put('/admin/notifikasi/{id}', [NotifikasiController::class, 'update'])->name('notifikasi.update');
    Route::delete('/admin/notifikasi/{id}', [NotifikasiController::class, 'destroy'])->name('notifikasi.destroy');
    Route::get('/admin/notifikasi/{id}', [NotifikasiController::class, 'show'])->name('notifikasi.show');

    //Service Admin
    Route::get('/service-status', [ServiceController::class, 'index'])->name('service_status.index');
    Route::get('/service/{id}/edit-status', [ServiceController::class, 'editStatus'])->name('service_status.edit');
    Route::put('/service/{id}/update-status', [ServiceController::class, 'updateStatus'])->name('service_status.update');


     // Pesanan Admin
    Route::post('/pesanan/{id}', [AdminPesananController::class, 'update'])->name('pesanan.update');
    Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('pesanan.index');

    // Pendapatan Admin
    Route::get('/pendapatan', [PendapatanController::class, 'index'])->name('admin.pendapatan.index');
    Route::get('/pendapatan/pdf', [PendapatanController::class, 'exportPdf'])->name('pendapatan.pdf');


});


