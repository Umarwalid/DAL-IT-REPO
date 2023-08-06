<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
// public route
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/product', [ProductController::class,'index'] );
Route::get('/product/{id}', [ProductController::class,'show'] );
Route::get('/product/search/{name}', [ProductController::class,'search']);
// protected route
Route::group(['middleware'=>['auth:sanctum']],function(){ 
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/product', [ProductController::class,'store']);
    Route::post('/product/{id}', [ProductController::class,'update']);
    Route::post('/product/{id}', [ProductController::class,'delete']);
});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
