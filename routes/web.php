<?php

use App\Models\OrganizationRole;
use App\Models\OrganizationBudget;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\OrganisasiTokenController;
use App\Http\Controllers\OrganizationBudgetController;
use App\Http\Controllers\OrganizationProgramController;

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

#dashboard organisasi
Route::get('/dashboard/organisasi', [OrganizationController::class, 'showOrganisasi'])->name('organisasi.index');

#suggestion divisian and role
Route::get('/dashboard/organisasi/initial-role-data', [OrganizationController::class, 'initialRoleData'])->name('organisasi.initial-role-data');
Route::post('/dashboard/organisasi/initial-role-data/save', [OrganizationController::class, 'savesuggest'])->name('organisasi.initial-role-data.save');


Route::get('/dashboard/organisasi/pengurus', [OrganizationController::class, 'showPengurus'])->name('organisasi.pengurus');

Route::get('/dashboard/organisasi/kegiatan', [OrganizationController::class, 'showKegiatan'])->name('organisasi.kegiatan');
#organisasi program kerja
Route::get('/dashboard/organisasi/program', [OrganizationProgramController::class, 'index'])->name('organisasi.program');
Route::post('/dashboard/organisasi/program/save', [OrganizationProgramController::class, 'storeProgram']);
Route::put('/dashboard/organisasi/program/{id}/update', [OrganizationProgramController::class, 'updateProgram']);
Route::delete('/dashboard/organisasi/program/{id}/delete', [OrganizationProgramController::class, 'deleteProgram']);


#organisasi anggaran
Route::get('/dashboard/organisasi/anggaran', [OrganizationBudgetController::class, 'index'])->name('organisasi.anggaran');
Route::get('/dashboard/organisasi/anggaran/{id}/edit', [OrganizationBudgetController::class, 'showBudgets'])->name('show.anggaran');
Route::get('/dashboard/organisasi/anggaran/create-detail/{anggaran}', [OrganizationBudgetController::class, 'showBudgetsDetail'])->name('show.anggaran.detail');
Route::post('/dashboard/organisasi/anggaran/create-detail/{anggaran}/save', [OrganizationBudgetController::class, 'storeBudgetsDetail'])->name('save.anggaran.detail');
Route::post('/dashboard/organisasi/anggaran/save', [OrganizationBudgetController::class, 'storeBudgets'])->name('save.anggaran');
Route::put('/dashboard/organisasi/anggaran/{id}/approval', [OrganizationBudgetController::class, 'updateApproval'])->name('update.anggaran.approval');
Route::put('/dashboard/organisasi/anggaran/{id}/update', [OrganizationBudgetController::class, 'updateBudgets'])->name('update.anggaran');
Route::delete('/dashboard/organisasi/anggaran/{id}/delete', [OrganizationBudgetController::class, 'deleteBudgets'])->name('delete.anggaran');
