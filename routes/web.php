<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
//authentication api
Route::get('/api/users',[UserController::class,'index']);
Route::post('/registration',[UserController::class,'store']);
Route::post('/login',[UserController::class,'login']);
Route::get('/api/user/{id}',[UserController::class,'show']);
Route::put('/api/users/{id}',[UserController::class,'update']);
Route::delete('/api/users/{id}',[UserController::class,'destroy']);
Route::delete('/logout',[UserController::class,'logout']);

//product api
Route::get('/api/products',[ProductController::class,'index']);
Route::post('/api/products',[ProductController::class,'store']);
Route::get('/api/product/{id}',[ProductController::class,'show']);
Route::put('/api/product/{id}',[ProductController::class,'update']);
Route::delete('/api/product/{id}',[ProductController::class,'update']);
Route::post('/api/product/filter',[ProductController::class,'filter']);

//reviews api
Route::get('/api/reviews',[ReviewController::class,'index']);
Route::post('/api/reviews',[ReviewController::class,'store']);
Route::post('/api/reviews/products',[ReviewController::class,'reviewsbyproduct']);
