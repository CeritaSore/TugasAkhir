<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventFormController;
use App\Http\Controllers\FormQuestionController;
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

Route::get('/dashboard/organisasi/kegiatan', [EventController::class, 'index'])->name('organisasi.kegiatan');
#organisasi program kerja
Route::get('/dashboard/organisasi/program', [OrganizationProgramController::class, 'index'])->name('organisasi.program');
Route::get('/dashboard/organisasi/program/editprogram/{namaprogram}', [OrganizationProgramController::class, 'showProgram'])->name('show.program.edit');
Route::get('/dashboard/organisasi/program/editstatus/{namaprogram}', [OrganizationProgramController::class, 'showProgramStatus'])->name('show.program.status');
Route::post('/dashboard/organisasi/program/save', [OrganizationProgramController::class, 'storeProgramAndBudgets'])->name('program.save');
Route::put('/dashboard/organisasi/program/{namaprogram}/update', [OrganizationProgramController::class, 'updateProgram'])->name('update.program');
Route::put('/dashboard/organisasi/program/status/{namaprogram}/update', [OrganizationProgramController::class, 'updateStatus'])->name('update.status');
Route::delete('/dashboard/organisasi/program/{namaprogram}/delete', [OrganizationProgramController::class, 'deleteProgram'])->name('program.delete');


#organisasi anggaran
Route::get('/dashboard/organisasi/anggaran', [OrganizationBudgetController::class, 'index'])->name('organisasi.anggaran');
Route::get('/dashboard/organisasi/anggaran/{id}/edit', [OrganizationBudgetController::class, 'showBudgets'])->name('show.anggaran');
Route::get('/dashboard/organisasi/anggaran/create-detail/{anggaran}', [OrganizationBudgetController::class, 'showBudgetsDetail'])->name('show.anggaran.detail');
Route::post('/dashboard/organisasi/anggaran/create-detail/{anggaran}/save', [OrganizationBudgetController::class, 'storeBudgetsDetail'])->name('save.anggaran.detail');
Route::post('/dashboard/organisasi/anggaran/save', [OrganizationBudgetController::class, 'storeBudgets'])->name('save.anggaran');
Route::put('/dashboard/organisasi/anggaran/{id}/approval', [OrganizationBudgetController::class, 'updateApproval'])->name('update.anggaran.approval');
Route::put('/dashboard/organisasi/anggaran/{id}/update', [OrganizationBudgetController::class, 'updateBudgets'])->name('update.anggaran');
Route::delete('/dashboard/organisasi/anggaran/{id}/delete', [OrganizationBudgetController::class, 'deleteBudgets'])->name('delete.anggaran');


# organisasi acara dan kegiatan
Route::get('/dashboard/organisasi/event', [EventController::class, 'index'])->name('organisasi.acara');
Route::get('/dashboard/organisasi/event/{slug}', [EventController::class, 'showEvent'])->name('show.event');
Route::post('/dashboard/organisasi/event/save', [EventController::class, 'storeEvent'])->name('store.event');
Route::put('/dashboard/organisasi/event/{slug}/update', [EventController::class, 'updateEvent'])->name('update.event');
Route::delete('/dashboard/organisasi/event/{slug}/delete', [EventController::class, 'deleteEvent'])->name('delete.event');
// buat nyimpen pertanyaan sama jawaban
Route::post('/dashboard/event/save', [EventFormController::class, 'storeform'])->name('form.save');
Route::get('/dashboard/event/form/{form}', [FormQuestionController::class, 'index'])->name('form.question');
Route::get('/dashboard/event/form/{form}/edit', [FormQuestionController::class, 'showform'])->name('edit.question');
Route::post('/dashboard/event/form/{form}/save', [FormQuestionController::class, 'store'])->name('save.question');
Route::put('/dashboard/event/form/{form}/update', [FormQuestionController::class, 'updateForm'])->name('update.question');
