<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardsuperadminController;
use App\Http\Controllers\Admin\DatapeternakController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\ModelhewanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::middleware('checkrole:superadmin')->group(function () {
    //     Route::get('/Superadmin', function () {
    //         return view('Superadmin.Superadmin');
    //     });

    Route::get('/dashboard', [DashboardsuperadminController::class, 'index'])->name('dashboardsuperadmin.index');
    Route::get('/datapeternak', [DatapeternakController::class, 'index'])->name('datapeternak.index');
    Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::resource('/informasis', \App\Http\Controllers\Admin\InformasiController::class);
    Route::resource('/peternaks', \App\Http\Controllers\Admin\DatapeternakController::class);
    // Route::get('/model', [ModelhewanController::class, 'index'])->name('modelhewan.index');

    Route::get('/admin/modelhewan', [ModelhewanController::class, 'index']);
    Route::get('/admin/upload', [ModelhewanController::class, 'showForm']) ->name('modelhewan.index');;
    Route::post('/admin/upload', [ModelhewanController::class, 'uploadImage']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// });
require __DIR__ . '/auth.php';
