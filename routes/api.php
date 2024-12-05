<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'category_new', 'as' => 'category_new.'], function () {
    Route::get('/index', [NewsController::class, 'index'])->name('index');
    Route::get('/index_new', [NewsController::class, 'index_new'])->name('index_new');
});



Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/index', [ProductsController::class, 'index'])->name('index');
    Route::get('/index-categories', [ProductsController::class, 'indexCategories'])->name('indexCategories');
    Route::get('/index-type-product', [ProductsController::class, 'indexType'])->name('indexType');

  
    Route::get('/rate-yo-product/{id}', [ProductsController::class, 'rateYoProduct'])->name('rateYoProduct');
    Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
    Route::get('/product-group/{id}', [ProductsController::class, 'productGroup'])->name('productGroup');
    Route::post('/store-rate-yo', [ProductsController::class, 'storeRateYo'])->name('storeRateYo');
    
});


Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::post('/add-to-cart', [OrderController::class, 'addCart'])->name('addCart');
    Route::post('/remove-to-cart', [OrderController::class, 'remove'])->name('remove');
    Route::post('/changer-product-to-cart', [OrderController::class, 'change'])->name('change');
    Route::get('/product-to-cart/{id}', [OrderController::class, 'productToCard'])->name('productToCard');
    Route::post('/checkout', [OrderController::class, 'createOrder'])->name('createOrder');

});
Route::get('/get-district/{id}', [UserController::class, 'getDistrict'])->name('getDistrict');
Route::get('/get-provinceid', [UserController::class, 'getProvinceid'])->name('getProvinceid');
Route::get('/get-get-ward/{id}', [UserController::class, 'getCityid'])->name('getCityid');