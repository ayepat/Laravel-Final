<?php

use App\Http\Controllers\Backoffice\BazarController as BackofficeBazarController;
use App\Http\Controllers\BazarController;
use Illuminate\Support\Facades\Route;



//-------------BAZAR KALA----------------

//---usuario---
Route::prefix('products')->controller(BazarController::class)->name('web.products.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});


//---admin---
Route::get('backoffice/products', [BackofficeBazarController::class, 'index'])->name('backoffice.products.index');
Route::get('backoffice/products/create', [BackofficeBazarController::class, 'create'])->name('backoffice.products.create');
Route::post('backoffice/products', [BackofficeBazarController::class, 'store']);
Route::get('backoffice/products/{id}/edit', [BackofficeBazarController::class, 'edit']);
Route::post('backoffice/products/{id}', [BackofficeBazarController::class, 'update']);
