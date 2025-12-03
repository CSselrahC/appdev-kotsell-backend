<?php
use Illuminate\Support\Facades\Route;

Route::apiResource('products', \App\Http\Controllers\ProductController::class);
Route::apiResource('admins', \App\Http\Controllers\AdminController::class);
Route::apiResource('customers', \App\Http\Controllers\CustomerController::class);
Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);
Route::apiResource('images', \App\Http\Controllers\ImageController::class);
Route::apiResource('carts', \App\Http\Controllers\CartController::class);
Route::apiResource('orders', \App\Http\Controllers\OrderController::class);
?>
