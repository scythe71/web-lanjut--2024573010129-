<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk semua user yang terautentikasi
    Route::get('/all', function () {
        return view('all');
    });

    // Rute untuk admin
    Route::get('/admin', function () {
        return view('admin');
    })->middleware('role:admin');
    
    // Rute untuk semua user yang terautentikasi
    Route::get('/manager', function () {
        return view('manager');
    })->middleware('role:manager');

    // Rute untuk semua user yang terautentikasi
    Route::get('/user', function () {
        return view('user');
    })->middleware('role:user');
});

require __DIR__.'/auth.php';
