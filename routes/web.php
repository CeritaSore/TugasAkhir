<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\OrgtokenController;
use App\Http\Middleware\Checkrole;
use App\Models\Orgtoken;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'dashboardRedirect'])->name('dashboard');
Route::middleware(Checkrole::class . ':kemahasiswaan')->group(function () {
    Route::get('/kema-dashboard', [DashboardController::class, 'indexKema'])->name('dashboard.kemahasiswaan');
    Route::get('/kema-dashboard/token', [OrgtokenController::class, 'index'])->name('create.token');
    Route::post('/kema-dashboard/token/save', [OrgtokenController::class, 'storeToken'])->name('save.token');
    Route::get('/kema-dashboard/organisasi', [KemahasiswaanController::class, 'index'])->name('show.organisasi');
    Route::get('/kema-dashboard/organisasi/create', [KemahasiswaanController::class, 'create'])->name('kemahasiswaan.create');
    Route::post('/kema-dashboard/organisasi/store', [KemahasiswaanController::class, 'store'])->name('kemahasiswaan.store');
    Route::get('/kema-dashboard/organisasi/edit/{id}', [KemahasiswaanController::class, 'find'])->name('kemahasiswaan.edit');
    Route::put('/kema-dashboard/organisasi/update/{id}', [KemahasiswaanController::class, 'update'])->name('kemahasiswaan.update');
});
Route::middleware(Checkrole::class . ':mahasiswa')->group(function () {
    Route::get('/m-dashboard', [DashboardController::class, 'indexMahasiswa'])->name('dashboard.mahasiswa');
    Route::get('/m-dashboard/redeem', [OrgtokenController::class, 'showredeem'])->name('show.redeem');
    Route::post('/m-dashboard/redeem/save', [OrgtokenController::class, 'storeRedeem'])->name('save.redeem');
});
Route::get('/login', [AuthController::class, 'index'])->name('view.login');
Route::get('/register', [AuthController::class, 'registration'])->name('view.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'saveregister'])->name('auth.register');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
