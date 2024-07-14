<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/expiry' , 'App\Http\Controllers\IndexController@indexExpiry');
Route::get('/catalog', 'App\Http\Controllers\IndexController@indexCatalog');
Route::get('/activate', 'App\Http\Controllers\IndexController@indexActivate');
Route::get('/registerVoucher', 'App\Http\Controllers\IndexController@indexRegister');

Route::get('/expiry/update', 'App\Http\Controllers\VoucherController@updateExpiry');
Route::get('/catalog/create', 'App\Http\Controllers\VoucherController@createCatalog');
Route::post('/activate/redeem', 'App\Http\Controllers\VoucherController@redeemVoucher');
Route::get('/activate/confirm/{vocer}', 'App\Http\Controllers\VoucherController@confirmVoucher');
Route::get('/registerVoucher/check', 'App\Http\Controllers\VoucherController@checkRegistry');
Route::post('/registerVoucher/checkout', 'App\Http\Controllers\VoucherController@registerVoucher');

// Route::get('/vouchers/search', 'App\Http\Controllers\VoucherController@search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
