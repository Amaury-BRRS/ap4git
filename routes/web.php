<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\EtablissementController;
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
});

Route::middleware('est_super_admin')->group(function () {

});
Route::get('/liste', [EtablissementController::class, 'index'])->name('superadmin.etablissement.index');
Route::get('/etablissement/create', [EtablissementController::class, 'create'])->name('superadmin.etablissement.create');
Route::post('/etablissement', [EtablissementController::class, 'store'])->name('superadmin.etablissement.store');
Route::get('/index', [SuperAdminController::class, 'index'])->name('superadmin.index');

require __DIR__.'/auth.php';

