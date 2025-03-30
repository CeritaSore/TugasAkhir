<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrganisasiTokenController;


Route::get('/dashboard/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan.index');
Route::get('/dashboard/kemahasiswaan/token', [OrganisasiTokenController::class, 'index'])->name('kemahasiswaan.token');
Route::get('/dashboard/kemahasiswaan/organisasi', [OrganizationController::class, 'index'])->name('kemahasiswaan.organisasi');
Route::get('/dashboard/kemahasiswaan/mahasiswa', [MahasiswaController::class, 'showMahasiswa'])->name('kemahasiswaan.mahasiswa');



Route::get('/dashboard/mahasiswa',[MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/dashboard/organisasi',[OrganizationController::class, 'showOrganisasi'])->name('organisasi.index');