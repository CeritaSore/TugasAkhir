<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrganisasiTokenController;

Route::get('/dashboard/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan.index');
Route::get('/dashboard/kemahasiswaan/token', [OrganisasiTokenController::class, 'index'])->name('kemahasiswaan.token');
Route::post('/dashboard/kemahasiswaan/token/save', [OrganisasiTokenController::class, 'storeToken'])->name('save.token');


Route::get('/dashboard/kemahasiswaan/organisasi', [OrganizationController::class, 'index'])->name('kemahasiswaan.organisasi');
Route::post('/dashboard/kemahasiswaan/organisasi/save', [OrganizationController::class, 'storeOrganization'])->name('save.organization');
Route::put('/dashboard/kemahasiswaan/organisasi/{nama}/update', [OrganizationController::class, 'updateOrganization'])->name('update.organization');
Route::delete('/dashboard/kemahasiswaan/organisasi/{nama}/delete', [OrganizationController::class, 'deleteOrganization'])->name('delete.organization');


Route::get('/dashboard/kemahasiswaan/mahasiswa', [KemahasiswaanController::class, 'showMahasiswa'])->name('kemahasiswaan.mahasiswa');
Route::post('/dashboard/kemahasiswaan/mahasiswa/save', [KemahasiswaanController::class, 'storemahasiswa'])->name('save.mahasiswa');
Route::put('/dashboard/kemahasiswaan/mahasiswa/{nama}/update', [KemahasiswaanController::class, 'updateMahasiswa'])->name('update.mahasiswa');
Route::delete('/dashboard/kemahasiswaan/mahasiswa/{nama}/delete', [KemahasiswaanController::class, 'deleteMahasiswa'])->name('delete.mahasiswa');



Route::get('/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/dashboard/organisasi', [OrganizationController::class, 'showOrganisasi'])->name('organisasi.index');
