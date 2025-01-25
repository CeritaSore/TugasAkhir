<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KemahasiswaanController;
=======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
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
<<<<<<< HEAD
    Route::get('/dashboard/organisasi', [KemahasiswaanController::class, 'index'])->name('show.organisasi');
    Route::get('/dashboard/organisasi/create', [KemahasiswaanController::class, 'create'])->name('kemahasiswaan.create');
    Route::post('/dashboard/organisasi/store', [KemahasiswaanController::class, 'store'])->name('kemahasiswaan.store');
    Route::get('/dashboard/organisasi/edit/{id}', [KemahasiswaanController::class, 'find'])->name('kemahasiswaan.edit');
    Route::put('/dashboard/organisasi/update/{id}', [KemahasiswaanController::class, 'update'])->name('kemahasiswaan.update');
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
});
Route::middleware(Checkrole::class . ':mahasiswa')->group(function () {
    Route::get('/dashboard/redeem', [OrgtokenController::class, 'showredeem'])->name('show.redeem');
    Route::post('/dashboard/redeem/save', [OrgtokenController::class, 'storeRedeem'])->name('save.redeem');
});
Route::get('/login', [AuthController::class, 'index'])->name('view.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
<<<<<<< HEAD
=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
>>>>>>> de896c1 (add laravel to repository)
=======
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
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
