<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', [PublicController::class, 'index'])->name('public.index');
// 2. Rute Perantara Pelacak Klik (Intermediary Tracking)
Route::get('/go/{link}', [PublicController::class, 'redirect'])->name('public.redirect');

/*
|--------------------------------------------------------------------------
| 2. RUTE OTENTIKASI (Khusus Guest / Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Route Logout (Wajib Memiliki Sesi Terautentikasi)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Route Group untuk halaman Admin 
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/links', [LinkController::class, 'index'])->name('links.index');

// RUTE DASHBOARD ANALYTICS (BARU)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rute Form & Pemrosesan Data
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');

    // Rute Edit, Update, dan Destroy (RESTful Standard)
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::put('/links/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
});