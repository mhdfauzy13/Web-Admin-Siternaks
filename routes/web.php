<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\DashboardsuperadminController;
use App\Http\Controllers\SuperAdmin\DataAdminController;
use App\Http\Controllers\SuperAdmin\DataMahasiswaController;
use App\Http\Controllers\SuperAdmin\ItemController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::middleware('checkrole:superadmin')->group(function () {
    //     Route::get('/Superadmin', function () { 
    //         return view('Superadmin.Superadmin');
    //     });
        Route::resource('/admins', \App\Http\Controllers\SuperAdmin\DataAdminController::class);
        Route::resource('/items', \App\Http\Controllers\SuperAdmin\ItemController::class);
        Route::get('/Barang/item', [ItemController::class, 'index'])->name('item.index');
        Route::get('/Pengguna/Dataadmin', [DataAdminController::class, 'index'])->name('dataadmin.index');
        Route::get('/Pengguna/Datamahasiswa', [DataMahasiswaController::class, 'index'])->name('datamahasiswa.index');
        Route::get('/dashboard', [DashboardsuperadminController::class, 'index'])->name('dashboardsuperadmin.index');

    });


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// });
require __DIR__.'/auth.php';
