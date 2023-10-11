<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





// User Authentication





// customer part

Route::resource('customers', CustomerController::class);

Route::resource('products', ProductController::class);

Route::resource('employees', EmployeesController::class);

Route::resource('oders', OrderController::class);