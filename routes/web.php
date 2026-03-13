<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\EtablissementController;
use Illuminate\Support\Facades\Route;

// route pour afficher la page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name("accueil");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('est_super_admin')->group(function () {

});
Route::get('/liste', [EtablissementController::class, 'index'])->name('superadmin.etablissement.index');
Route::get('/etablissement/create', [EtablissementController::class, 'create'])->name('superadmin.etablissement.create');
Route::post('/etablissement', [EtablissementController::class, 'store'])->name('superadmin.etablissement.store');
Route::get('/index', [SuperAdminController::class, 'index'])->name('superadmin.index');
Route::get('/etablissement/{id}/edit', [EtablissementController::class, 'edit'])->name('superadmin.etablissement.edit');
Route::put('/etablissement/{id}', [EtablissementController::class, 'update'])->name('superadmin.etablissement.update');
Route::delete('/etablissement/{id}', [EtablissementController::class, 'destroy'])->name('superadmin.etablissement.destroy');

require __DIR__.'/auth.php';

