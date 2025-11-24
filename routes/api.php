<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/me', function (Request $request) {
        return $request->user();
    });


    Route::apiResource('clients', ClientController::class)
        ->names('api.clients')
        ->middleware('role:admin,gestion,consultas');


    Route::get('/users', [UserController::class, 'index'])
        ->middleware('role:admin,gestion,consultas');
    Route::get('/users/{id}', [UserController::class, 'show'])
        ->middleware('role:admin,gestion,consultas');

    Route::post('/users', [UserController::class, 'store'])
        ->middleware('role:admin');

    Route::put('/users/{id}', [UserController::class, 'update'])
        ->middleware('role:admin,gestion');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->middleware('role:admin');
});
