<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('product');
});

Route::resource('orders', OrderController::class);

Route::get('payments/checkout/{id}', [PaymentController::class, 'checkout']);
Route::post('payments/success/{id}', [PaymentController::class, 'success']);
Route::get('payments/cancel', [PaymentController::class, 'cancel']);
Route::get('payments', [PaymentController::class, 'index']);

