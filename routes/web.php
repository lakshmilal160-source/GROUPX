<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.auth');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginPost'])
        ->name('login.post');
        Route::middleware('auth')->group(function(){
                Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        });
});
