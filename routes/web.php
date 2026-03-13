<?php

use App\Http\Controllers\EchangeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// route pour afficher le template.blade.php par défaut 
Route::get('/', function () {
    return view('template');
})->name("template"); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('echange', EchangeController::class);
});


require __DIR__.'/auth.php';

