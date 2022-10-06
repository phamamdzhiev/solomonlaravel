<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('app_index');
Route::get('/product/{id}', [\App\Http\Controllers\IndexController::class, 'showProduct'])->name('app_product');
Route::post('/messages', [\App\Http\Controllers\IndexController::class, 'storeMessage'])->name('app_message_post');
Route::post('/order/send', [\App\Http\Controllers\IndexController::class, 'storeOrder'])->name('app_order_post');

//NO CONTROLLER ROUTES
Route::get('/quality', function () {
    return view('pages.quality');
})->name('app_quality');
Route::get('/about', function () {
    return view('pages.about');
})->name('app_about');
Route::get('/partners', function () {
    return view('pages.partners');
})->name('app_partners');
Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('app_contacts');
Route::get('/policy', function () {
    return view('pages.policy');
})->name('app_policy');

//Custom forms routes
Route::group(['prefix' => 'formlazer'], function () {
    Route::get('/', [\App\Http\Controllers\FormLazerController::class, 'index'])->name('app_formlazer');
    Route::post('/', [\App\Http\Controllers\FormLazerController::class, 'create'])->name('app_formlazer_post');
});

Route::group(['prefix' => 'formorder'], function () {
    Route::get('/', [\App\Http\Controllers\FormOrderController::class, 'index'])->name('app_formorder');
    Route::post('/', [\App\Http\Controllers\FormOrderController::class, 'create'])->name('app_formorder');
});

//ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/products', [\App\Http\Controllers\AdminController::class, 'index'])->name('app_admin');
    Route::get('/orders', [\App\Http\Controllers\AdminController::class, 'orders'])->name('app_orders');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editProduct'])->name('app_admin_edit');
    Route::get('/formlazers', [\App\Http\Controllers\AdminController::class, 'formlazers'])->name('app_admin_formlazers');
    Route::post('/product/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editProductSave'])->name('app_admin_edit_save');
    Route::post('/products', [\App\Http\Controllers\AdminController::class, 'storeProduct'])->name('app_admin_post');
    Route::delete('/products/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('app_admin_delete');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware('guest')->group(function () {
//    Route::get('register', [RegisteredUserController::class, 'create'])
//                ->name('register');

//    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('app_login_post');
});


//Route::get('/mails', function() {
//    return view('mailables.formlazer');
//});
//
//Route::get('/mails2', function() {
//    return view('mailables.formorder');
//});
