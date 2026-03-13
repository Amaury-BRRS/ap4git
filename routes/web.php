<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\liste\UserController;
use Illuminate\Support\Facades\Route;


// route pour afficher la page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name("accueil");

Route::get('/template', function () {
    return view('template');
})->middleware(['auth', 'verified'])->name('template');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes listes utilisateurs
Route::middleware('auth')->prefix('liste_utilisateurs')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('liste_utilisateurs.user');
    Route::get('/admin', [UserController::class, 'admin'])->name('liste_utilisateurs.admin');
    Route::get('/superadmin', [UserController::class, 'superadmin'])->name('liste_utilisateurs.super_admin');
    Route::delete('/user/{id}' , [UserController::class, 'destroy'])->name('liste_utilisateurs.destroy');
    Route::patch('/user/{id}' , [UserController::class, 'updateRole'])->name('liste_utilisateurs.update_role');
});

require __DIR__.'/auth.php';

