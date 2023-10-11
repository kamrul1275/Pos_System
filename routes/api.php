<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthController;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





// User Authentication

//registation and login

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
   
   
});  




// customer part


Route::middleware('auth:sanctum')->group( function () {
    

    Route::resource('customers', CustomerController::class);

    Route::resource('products', ProductController::class);
    
    Route::resource('employees', EmployeesController::class);
    
    Route::resource('oders', OrderController::class);

});





