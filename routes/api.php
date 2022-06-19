<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopingCartController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'index')->name('category.name');
    Route::post('/category/add', 'create');
    Route::get('/subcategory', 'subcat');
});

//product
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::post('/subcategory/add', 'test');
    Route::post('/add','store');
    Route::post('/image', 'test');
    Route::get('/', 'index');
    Route::get('/filter', 'filter');
    Route::get('/{id}', 'show');

});
//user
Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::group([ 'middleware' => 'auth:sanctum'], function () {
        Route::get('/logout', 'logout');
        Route::get('/profile', 'getUser');
        Route::get('/{id}', 'show');
    });
});

//Shoping card
Route::controller(ShopingCartController::class)->middleware('auth:sanctum')->prefix('shopingcart')->group(function () {
    Route::post('/add', 'store');
    Route::get('/', 'getUserCart');
   // Route::get('/{id}', 'show');
    Route::delete('/{id?}', 'destroy');
    Route::post('/update', 'update');
    Route::post('/buyproduct', 'buyProduct');
    Route::get('/user', 'getUser');
});
