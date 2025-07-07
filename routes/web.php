<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::get('/catalogue', [ProductController::class, 'catalogue'])->name('catalogue');
Route::get('/catalogue/{id}', [ProductController::class, 'detailProduct'])->name('catalogue.detail');

Route::middleware(['auth'])->group(function () {
  Route::redirect('settings', 'settings/profile');
  // Topup
  Route::get('/topup', [DepositController::class, 'index'])->name('topup');
  Route::post('/topup/create', [DepositController::class, 'createDeposit'])->name('topup.create');
  Route::get('/topup/return', [DepositController::class, 'handleReturn'])->name('topup.return');
  Route::get('/topup/success', function () {
    return view('deposits.success');
  })->name('topup.success');
  Route::get('/topup/failed', function () {
    return view('deposits.failed');
  })->name('topup.failed');
  // Transaction
  Route::get('checkout/{product}', [TransactionController::class, 'checkout'])->name('checkout');
  Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');

  //Riwayat Transaksi
  Route::get('historytrx', [DepositController::class, 'show'])->name('trx.history');
  Route::get('historyproduct', [TransactionController::class,'showtrx'])->name('trx.product');
  Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
  Volt::route('settings/password', 'settings.password')->name('settings.password');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
  Route::resource('products', ProductController::class);
});

Route::middleware(['auth', 'role:supervisor'])->group(function () {
  Route::view('/supervisor', 'supervisor.dashboard')->name('supervisor.dashboard');
});


require __DIR__ . '/auth.php';
