<?php

use App\Http\Controllers\Backoffice\BazarController as BackofficeBazarController;
use App\Http\Controllers\BazarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//-------------BAZAR KALA----------------

//landing page
Route::get('/', [BazarController::class, 'landingpage'])->name('web.landingpage');

//landigpage admin
Route::get('/backoffice', [BackofficeBazarController::class, 'landingpage'])->name('backoffice.landingpage');


//---usuario---
    Route::get('/products', [BazarController::class, 'index'])->name('web.products.index');
    Route::get('/products/{id}',[BazarController::class, 'show'])->name('web.products.show');
    Route::get('/products/category/{category_id}', [BazarController::class, 'filterByCategory'])->name('web.products.category');

//---admin---
Route::get('backoffice/products', [BackofficeBazarController::class, 'index'])->name('backoffice.products.index');
Route::get('backoffice/products/create', [BackofficeBazarController::class, 'create'])->name('backoffice.products.create');
Route::post('backoffice/products', [BackofficeBazarController::class, 'store']);
Route::get('backoffice/products/{id}/edit', [BackofficeBazarController::class, 'edit']);
Route::post('backoffice/products/{id}', [BackofficeBazarController::class, 'update'])->name('backoffice.products.update');
Route::delete('/backoffice/products/{product}', [BackofficeBazarController::class, 'destroy'])->name('backoffice.products.destroy');
Route::get('backoffice/category/{category_id}', [BackofficeBazarController::class, 'filterByCategory'])->name('backoffice.products.category');

//---login---
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//---carrito de compras---
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('web.cart.add');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('web.cart.checkout');
    Route::post('/cart/buy', [CartController::class, 'buy'])->name('web.cart.buy');
});