<?php

use App\Http\Controllers\CompleteOrderController;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Product\Create;
use App\Http\Livewire\Product\Show;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Product\Edit;

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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', Create::class)->name('products.create')->middleware('admin');
Route::get('/edit/{product}', Edit::class)->name('products.edit')->middleware('admin');
Route::get('/productos/{product}',Show::class)->name('products.show');
Route::get('/checkout',Checkout::class)->name('checkout')->middleware('check');

Route::get('/paypal/payment',[PaymentController::class,'paypalPaymentRequest'])->name('paypal.payment');
Route::get('/paypal/checkout/{status}',[PaymentController::class,'paypalCheckout'])->name('paypal.checkout');
Route::post('/stripe/checkout',[PaymentController::class,'stripeCheckout'])->name('stripe.checkout');

Route::get('/order/complete/{order}',[CompleteOrderController::class,'completeForm'])->name('order.complete');
Route::post('/order/{order}',[CompleteOrderController::class,'completeOrder'])->name('complete');