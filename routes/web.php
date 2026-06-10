<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommitteeController;

Route::get('/', [PageController::class, 'home'])->name('home');

// Public news and committee routes
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');
Route::get('/tentang-kami', [CommitteeController::class, 'index'])->name('tentang-kami');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forget-password', [AuthController::class, 'showForgetPassword'])->name('password.request');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin News CRUD (Query Builder)
    Route::get('/dashboard/berita', [NewsController::class, 'adminIndex'])->name('admin.berita.index');
    Route::get('/dashboard/berita/create', [NewsController::class, 'create'])->name('admin.berita.create');
    Route::post('/dashboard/berita', [NewsController::class, 'store'])->name('admin.berita.store');
    Route::get('/dashboard/berita/{id}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/dashboard/berita/{id}', [NewsController::class, 'update'])->name('admin.berita.update');
    Route::delete('/dashboard/berita/{id}', [NewsController::class, 'destroy'])->name('admin.berita.destroy');

    // Admin Committee CRUD (Raw SQL)
    Route::get('/dashboard/pengurus', [CommitteeController::class, 'adminIndex'])->name('admin.pengurus.index');
    Route::get('/dashboard/pengurus/create', [CommitteeController::class, 'create'])->name('admin.pengurus.create');
    Route::post('/dashboard/pengurus', [CommitteeController::class, 'store'])->name('admin.pengurus.store');
    Route::get('/dashboard/pengurus/{id}/edit', [CommitteeController::class, 'edit'])->name('admin.pengurus.edit');
    Route::put('/dashboard/pengurus/{id}', [CommitteeController::class, 'update'])->name('admin.pengurus.update');
    Route::delete('/dashboard/pengurus/{id}', [CommitteeController::class, 'destroy'])->name('admin.pengurus.destroy');
});

Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi');
Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');