<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth']);

Route::post('/users', [UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::patch('/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
    Route::post('/customers/{param}', [CustomerController::class, 'search']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

