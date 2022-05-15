<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;



Route::get('/',[FrontendController::class, 'index']);
Route::get('/category',[FrontendController::class, 'category']);
Route::get('category/{slug}',[FrontendController::class, 'viewCategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class, 'productView']);

Auth::routes();

Route::post('add-to-cart',[CartController::class, 'addProduct']);
//Route::post('delete-cart-item',[CartController::class, 'deleteProduct']);
Route::get('delete-cart-item/{id}',[CartController::class, 'deleteCart']);
Route::post('update-cart',[CartController::class, 'updateCart']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class, 'viewCart']);  
    Route::get('checkout',[CheckoutController::class, 'index']);  
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontController::class, 'index'])->name('dashboard');
    Route::get('/categories',[CategoryController::class, 'index'])->name('category.list');
    Route::get('/add_category',[CategoryController::class, 'add']);
    Route::post('insert-category',[CategoryController::class, 'insert']);
    Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('update-category/{id}',[CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'delete']);

    //products

    Route::get('products',[ProductController::class, 'index'])->name('product.list');
    Route::get('add_products',[ProductController::class, 'add']);
    Route::post('insert-product',[ProductController::class, 'insert']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}',[ProductController::class, 'delete']);
    


    
});
