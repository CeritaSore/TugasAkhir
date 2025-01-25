<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\OrgtokenController;
use App\Http\Middleware\Checkrole;
use App\Models\Orgtoken;
use Illuminate\Support\Facades\Route;

Route::get("/", [DashboardController::class, "dashboardRedirect"]);
Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard');
Route::middleware(Checkrole::class . ':kemahasiswaan')->group(function () {
    Route::get('/dashboard/token', [OrgtokenController::class, 'index'])->name('create.token');
    Route::post('/dashboard/token/save', [OrgtokenController::class, 'storeToken'])->name('save.token');
    Route::get('/dashboard/organisasi', [KemahasiswaanController::class, 'index'])->name('show.organisasi');
    Route::get('/dashboard/organisasi/create', [KemahasiswaanController::class, 'create'])->name('kemahasiswaan.create');
    Route::post('/dashboard/organisasi/store', [KemahasiswaanController::class, 'store'])->name('kemahasiswaan.store');
    Route::get('/dashboard/organisasi/edit/{id}', [KemahasiswaanController::class, 'find'])->name('kemahasiswaan.edit');
    Route::put('/dashboard/organisasi/update/{id}', [KemahasiswaanController::class, 'update'])->name('kemahasiswaan.update');
});
Route::middleware(Checkrole::class . ':mahasiswa')->group(function () {
    Route::get('/dashboard/redeem', [OrgtokenController::class, 'showredeem'])->name('show.redeem');
    Route::post('/dashboard/redeem/save', [OrgtokenController::class, 'storeRedeem'])->name('save.redeem');
});
Route::get('/login', [AuthController::class, 'index'])->name('view.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
