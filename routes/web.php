<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;

// Route::get('/', function () {
//     return view('beranda');
// })->name('beranda');

// Routing Auth (Login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routing Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/', [LayananController::class, 'beranda'])->name('beranda');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
    Route::post('/admin/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::get('/admin/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
    Route::put('/admin/layanan/{layanan}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/admin/layanan/{layanan}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
});
