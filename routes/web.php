<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganisasiController;

Route::get("/", [OrganisasiController::class,"index"]);