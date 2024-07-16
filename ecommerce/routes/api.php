<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AttributeController;

Route::middleware('auth:sanctum')->group(function () {
Route::post('orders', [OrderController::class, 'store']);
Route::get('orders', [OrderController::class, 'index']);
Route::post('cart', [CartController::class, 'store']);
Route::put('cart/{product}', [CartController::class, 'update']);
Route::delete('cart/{product}', [CartController::class, 'destroy']);
});

Route::get('categories', [CategoryController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{slug}', [ProductController::class, 'show']);

Route::apiResource('attributes', AttributeController::class)->except(['show']);

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // Add other routes that require authentication here
});

