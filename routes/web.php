<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;



Route::get('/', [MainController::class,'main'])->middleware('is_admin');
Route::get('/dashboard', [MainController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('applications',\App\Http\Controllers\ApplicationController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';





