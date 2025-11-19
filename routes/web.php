<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\LayananController;


// Routing Auth (Login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routing Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/', [LayananController::class, 'beranda'])->name('beranda');
Route::get('/portofolio', [PortoController::class, 'portofolio'])->name('portofolio');

Route::middleware(['auth'])->group(function () {

    # ADMIN LAYANAN
    Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
    Route::post('/admin/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/admin/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/admin/layanan/{layanan}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/admin/layanan/{layanan}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

    # ADMIN PORTOFOLIO
    Route::get('/admin/portofolio', [PortoController::class, 'index'])->name('admin.porto');
    Route::get('/admin/portofolio/create', [PortoController::class, 'create'])->name('admin.porto.create');
    Route::post('/admin/portofolio', [PortoController::class, 'store'])->name('admin.porto.store');
    Route::get('/admin/portofolio/{portofolio}/edit', [PortoController::class, 'edit'])->name('admin.porto.edit');
    Route::put('/admin/portofolio/{portofolio}', [PortoController::class, 'update'])->name('admin.porto.update');
    Route::delete('/admin/portofolio/{portofolio}', [PortoController::class, 'destroy'])->name('admin.porto.destroy');
});
