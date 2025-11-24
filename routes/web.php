<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\ClientController;
use App\Http\Controllers\Web\UserWebController;

Route::get('/login', [AuthWebController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthWebController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', fn() => redirect()->route('clients.index'));

    Route::resource('clients', ClientController::class);  

    Route::resource('users', UserWebController::class);
});
