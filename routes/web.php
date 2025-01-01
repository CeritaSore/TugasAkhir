<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
Route::get(
    "/dashboard",
    function () {
        return view("dashboard");
    }
);
Route::get('/login', [AuthController::class, 'index'])->name('home');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/dashboard/token', [DashboardController::class, 'index'])->name('create.token');