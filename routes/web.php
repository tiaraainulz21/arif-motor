<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\StrukPesananController;

Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product/{name}', [ProductController::class, 'showByName'])->name('product.showByName');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/ringkasan-pesanan', [OrderController::class, 'summary'])->name('order.summary');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register_post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
Route::get('/struk-pesanan', [StrukPesananController::class, 'index'])->name('struk.pesanan');
Route::get('/struk-pesanan/{id}', [StrukPesananController::class, 'show'])->name('struk.pesanan.show');
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');
Route::get('/status', [StatusController::class, 'index'])->name('status');
Route::get('/service', [ServiceController::class, 'showForm'])->name('service.form');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/resume/{id}', [ServiceController::class, 'showResume'])->name('service.resume');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
