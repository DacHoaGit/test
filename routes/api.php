<?php

use App\Http\Controllers\Api\ProductController;
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



Route::prefix('v1/product')->group(function () {
    Route::get('list', [ProductController::class,'list']);
    Route::delete('delete/{product}', [ProductController::class,'destroy']);
    Route::post('update/{product}', [ProductController::class,'update']);
});

