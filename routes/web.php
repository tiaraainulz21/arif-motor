<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StrukPesananController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register_post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
Route::get('/struk-pesanan', [StrukPesananController::class, 'index'])->name('struk.pesanan');
Route::get('/struk-pesanan/{id}', [StrukPesananController::class, 'show'])->name('struk.pesanan.show');
Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi');
Route::get('/status', [StatusController::class, 'index'])->name('status');
Route::get('/service', [ServiceController::class, 'showForm'])->name('service.form');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::get('/service/resume/{id}', [ServiceController::class, 'showResume'])->name('service.resume');
Route::get('/profile', [AuthController::class, 'profile'])->name('customer.profile');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('customer.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('customer.update');
