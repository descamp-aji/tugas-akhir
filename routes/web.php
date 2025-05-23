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
    Route::get('/user/regist', \App\Livewire\Users\Registration::class)->name('regist');
    Route::get('/user/control', \App\Livewire\Users\Users::class)->name('control');
    Route::get('/user/{user}', \App\Livewire\Users\Profile::class)->name('profile');
    Route::get('/transaksi', \App\Livewire\Transaksi::class)->name('transaksi');
    Route::get('/pemberkasan', \App\Livewire\Pemberkasan::class)->name('pemberkasan');
    Route::get('/', \App\Livewire\Dashboard::class)->name('dashboard');
});

Route::get('/logout', [\App\Http\Controllers\Logout::class, 'logout'])->name('logout');
Route::get('/login', \App\Livewire\Users\Login::class)->name('login')->middleware('guest');