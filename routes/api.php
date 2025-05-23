<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganisasiTokenController;
use App\Http\Controllers\OrganizationBudgetController;
use App\Http\Controllers\OrganizationRoleController;
use App\Http\Controllers\OrganizationProgramController;
use App\Http\Controllers\OrganizationCoreTeamController;
use App\Http\Controllers\OrganizationDivisionController;
use App\Models\OrganizationBudget;

Route::get('/token', [OrganisasiTokenController::class, 'index']);
#show all organization and store
Route::get('/organisasi', [OrganizationController::class, 'index']);
Route::post('/organisasi/save', [OrganizationController::class, 'storeOrganization']);
Route::put('/organisasi/{id}/update', [OrganizationController::class, 'updateOrganization']);
Route::delete('/organisasi/{id}/delete', [OrganizationController::class, 'deleteOrganization']);
#store and redeem token
Route::post('/token/save', [OrganisasiTokenController::class, 'storeToken']);
Route::post('/token/redeem', [OrganisasiTokenController::class, 'redeemToken']);

#dashboard organization
Route::get('/dashboard/organisasi', [OrganizationController::class, 'showOrganisasi']);
Route::put('/dashboard/organisasi/{nama}', [OrganizationController::class, 'editOrganisasi']);

#organisasi coreteam
Route::get('/dashboard/organisasi/coreteam', [OrganizationCoreTeamController::class, 'index']);
Route::post('/dashboard/organisasi/coreteam/recruit', [OrganizationCoreTeamController::class, 'recruit']);
Route::delete('/dashboard/organisasi/coreteam/{id}/fired', [OrganizationCoreTeamController::class, 'firedOrStop']);

#organisasi role
Route::get('/dashboard/organisasi/role', [OrganizationRoleController::class, 'index']);
Route::post('/dashboard/organisasi/role/add', [OrganizationRoleController::class, 'storeRole']);
Route::put('/dashboard/organisasi/role/{id}/update', [OrganizationRoleController::class, 'updateRole']);
Route::delete('/dashboard/organisasi/role/{id}/delete', [OrganizationRoleController::class, 'deleteRole']);

#organisasi divisi
Route::get('/dashboard/organisasi/divisi', [OrganizationDivisionController::class, 'index']);
Route::post('/dashboard/organisasi/divisi/save', [OrganizationDivisionController::class, 'storeDivisi']);
Route::put('/dashboard/organisasi/divisi/{id}/update', [OrganizationDivisionController::class, 'updateDivisi']);
Route::delete('/dashboard/organisasi/divisi/{id}/delete', [OrganizationDivisionController::class, 'deleteDivisi']);

#organisasi program
Route::get('/dashboard/organisasi/program', [OrganizationProgramController::class, 'index']);
Route::post('/dashboard/organisasi/program/save', [OrganizationProgramController::class, 'storeProgramAndBudgets']);
Route::put('/dashboard/organisasi/program/{id}/update', [OrganizationProgramController::class, 'updateProgram']);
Route::delete('/dashboard/organisasi/program/{id}/delete', [OrganizationProgramController::class, 'deleteProgram']);

#organisasi acara dan kegiatan
Route::get('/dashboard/organisasi/event', [EventController::class, 'index']);
Route::post('/dashboard/organisasi/event/save', [EventController::class, 'storeEvent']);
Route::put('/dashboard/organisasi/event/{slug}/update', [EventController::class, 'updateEvent']);
Route::delete('/dashboard/organisasi/event/{slug}/delete', [EventController::class, 'deleteEvent']);

#organisasi acara dan kegiatan(pendaftaran)
Route::get('/dashboard/organisasi/event/{slug}/pendaftaran', [FormQuestionController::class, 'index']);
Route::post('/dashboard/organisasi/event/{slug}/pendaftaran/save', [FormQuestionController::class, 'storeForm']);
Route::put('/dashboard/organisasi/event/{slug}/pendaftaran/update', [FormQuestionController::class, 'updateForm']);
Route::delete('/dashboard/organisasi/event/{slug}/pendaftaran/{id}/delete', [FormQuestionController::class, 'deleteForm']);

#organisasi anggaran
Route::get('/dashboard/organisasi/anggaran', [OrganizationBudgetController::class, 'index']);
Route::get('/dashboard/organisasi/anggaran/create-detail/{anggaran}',[OrganizationBudgetController::class,'showBudgetsDetail']);
Route::post('/dashboard/organisasi/anggaran/create-detail/{anggaran}/save', [OrganizationBudgetController::class, 'storeBudgetsDetail'])->name('save.anggaran.detail');
Route::post('/dashboard/organisasi/anggaran/save', [OrganizationBudgetController::class, 'storeBudgets']);
Route::put('/dashboard/organisasi/anggaran/{id}/update', [OrganizationBudgetController::class, 'updateBudgets']);
Route::delete('/dashboard/organisasi/anggaran/{id}/delete', [OrganizationBudgetController::class, 'deleteBudgets']);