<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::middleware('auth:sanctum')->get('/products', [ProductsController::class, 'index']);
Route::middleware('auth:sanctum')->post('/store', [ProductsController::class, 'store']);
Route::middleware('auth:sanctum')->put('/update/{product_id}', [ProductsController::class, 'update']);
Route::middleware('auth:sanctum')->get('/show/{product_id}', [ProductsController::class, 'show']);
Route::middleware('auth:sanctum')->get('/delete/{product_id}', [ProductsController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/filter/{category_id}', [ProductsController::class, 'filter']);
Route::middleware('auth:sanctum')->post('/store-category', [CategoriesController::class, 'store']);
