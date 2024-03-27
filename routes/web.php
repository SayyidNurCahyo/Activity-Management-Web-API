<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [ActivityController::class, 'read'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/create', [ActivityController::class, 'getCreate'])->name('create.read');
    Route::post('/create', [ActivityController::class, 'create'])->name('create');
    Route::get('/dashboard', [ActivityController::class, 'read'])->name('dashboard');
    Route::put('/dashboard/{id}', [ActivityController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{id}', [ActivityController::class, 'delete'])->name('dashboard.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
