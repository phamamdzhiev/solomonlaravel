<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('app_index');
Route::get('/product/{id}', [\App\Http\Controllers\IndexController::class, 'showProduct'])->name('app_product');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/products', [\App\Http\Controllers\AdminController::class, 'index'])->name('app_admin');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editProduct'])->name('app_admin_edit');
    Route::post('/product/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editProductSave'])->name('app_admin_edit_save');
    Route::post('/products', [\App\Http\Controllers\AdminController::class, 'storeProduct'])->name('app_admin_post');
    Route::delete('/products/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('app_admin_delete');
});
