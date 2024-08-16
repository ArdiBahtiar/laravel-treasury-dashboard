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
    return view('indexes.indexDashboard');
});

Route::get('/expiry' , 'App\Http\Controllers\IndexController@indexExpiry')->middleware('auth');
Route::get('/expiry/update', 'App\Http\Controllers\VoucherController@updateExpiry')->middleware('auth');

Route::get('/catalog', 'App\Http\Controllers\IndexController@indexCatalog')->middleware('auth');
Route::get('/catalog/create', 'App\Http\Controllers\VoucherController@createCatalog')->middleware('auth');

Route::get('/activate', 'App\Http\Controllers\IndexController@indexActivate');
Route::post('/activate/redeem', 'App\Http\Controllers\VoucherController@redeemVoucher');
Route::get('/activate/confirm/{vocer}', 'App\Http\Controllers\VoucherController@confirmVoucher');

Route::get('/registerVoucher', 'App\Http\Controllers\IndexController@indexRegister')->middleware('auth');
Route::get('/registerVoucher/check', 'App\Http\Controllers\VoucherController@checkRegistry')->middleware('auth');
Route::post('/registerVoucher/checkout', 'App\Http\Controllers\VoucherController@registerVoucher')->middleware('auth');

Route::get('/generate', 'App\Http\Controllers\indexController@indexGenerate')->middleware('auth');
Route::get('/generate/confirm', 'App\Http\Controllers\VoucherController@generateVoucher')->middleware('auth');

Route::get('/order', 'App\Http\Controllers\IndexController@indexOrder')->middleware('auth');
Route::get('/order/confirm', 'App\Http\Controllers\VoucherController@order')->middleware('auth');

// Route::get('/vouchers/search', 'App\Http\Controllers\VoucherController@search');

Route::get('/dashboard', function () {
    return view('indexes.indexDashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
