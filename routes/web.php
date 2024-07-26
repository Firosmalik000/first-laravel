<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// import
use App\Http\Controllers\HomeController;

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

// middleware di tambahkan yang sudah diinisialisasi di bootstrap
route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);