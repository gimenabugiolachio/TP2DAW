<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\UserWebController;
use App\Http\Controllers\Web\SaleWebController;

Route::get('/login', [AuthWebController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthWebController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('clients', ClientController::class);

    Route::get('clients/{client}/sales', [SaleWebController::class, 'index'])
        ->name('clients.sales.index');

    Route::resource('users', UserWebController::class);
});
