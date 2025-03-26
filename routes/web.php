<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\OrganisasiTokenController;

Route::get('/', function () {
    return view('index');
});
#index kema
Route::get('/dashboard/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('home');
#show all token and store
Route::get('/dashboard/kemahasiswaan/token', [OrganisasiTokenController::class, 'index'])->name('token');
#show all organization and store
Route::get('/dashboard/kemahasiswaan/organisasi', [OrganizationController::class, 'index'])->name('organisasi');
Route::post('/organisasi/save', [OrganizationController::class, 'storeOrganization']);
Route::put('/organisasi/{id}/update', [OrganizationController::class, 'updateOrganization']);
Route::delete('/organisasi/{id}/delete', [OrganizationController::class, 'deleteOrganization']);
#store and redeem token
Route::post('/token/save', [OrganisasiTokenController::class, 'storeToken']);
Route::post('/token/redeem', [OrganisasiTokenController::class, 'redeemToken']);
