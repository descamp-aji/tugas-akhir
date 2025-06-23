<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    Route::get('/transaksi/cariDokumen', \App\Livewire\Transaction\CariDokumen::class)->name('cariDokumen');
    Route::get('/transaksi/peminjaman', \App\Livewire\Transaction\Peminjaman::class)->name('peminjaman');
    Route::get('/users/{id}/profile', \App\Livewire\Users\Profile::class)->name('profile');
    Route::get('/', \App\Livewire\Home::class)->name('home');
    Route::middleware('role:admin')->group(function() {
        Route::get('/transaksi/konfirmasi', \App\Livewire\Transaction\KonfirmasiTransaksi::class)->name('konfirmasi');
        Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
        Route::get('/users/regist', \App\Livewire\Users\Registration::class)->name('regist');
        Route::get('/pengemasan/berkas', \App\Livewire\Pengemasan\FormBerkas::class)->name('berkas');
        Route::get('/pengemasan/kemasan', \App\Livewire\Pengemasan\FormKemasan::class)->name('kemasan');
        Route::get('/pengemasan/wajib-pajak', \App\Livewire\Pengemasan\FormWajibPajak::class)->name('wajibPajak');
        Route::get('/users/control', \App\Livewire\Users\Users::class)->name('control');
    });
});

Route::get('/logout', [\App\Http\Controllers\Logout::class, 'logout'])->name('logout');
Route::get('/login', \App\Livewire\Users\Login::class)->name('login')->middleware('guest');