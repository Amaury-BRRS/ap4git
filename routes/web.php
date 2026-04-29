<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\liste\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EchangeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EnqueteController;
use Illuminate\Support\Facades\Route;


// route pour afficher la page d'accueil
Route::get('/', function () {
    return view('accueil');
})->name("accueil");

Route::get('/template', function () {
    return view('template');
})->middleware(['auth', 'verified'])->name('template');

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

Route::middleware('is_super_admin')->group(function () {
});

Route::middleware('is_admin')->group(function () {
});

Route::get('/liste', [EtablissementController::class, 'index'])->name('superadmin.etablissement.index');
Route::get('/etablissement/create', [EtablissementController::class, 'create'])->name('superadmin.etablissement.create');
Route::post('/etablissement', [EtablissementController::class, 'store'])->name('superadmin.etablissement.store');
Route::get('/index', [SuperAdminController::class, 'index'])->name('superadmin.index');
Route::get('/etablissement/{id}/edit', [EtablissementController::class, 'edit'])->name('superadmin.etablissement.edit');
Route::put('/etablissement/{id}', [EtablissementController::class, 'update'])->name('superadmin.etablissement.update');
Route::delete('/etablissement/{id}', [EtablissementController::class, 'destroy'])->name('superadmin.etablissement.destroy');

Route::get('/listeformation', [FormationController::class, 'index'])->name('superadmin.formation.index');
Route::get('/formation/create', [FormationController::class, 'create'])->name('superadmin.formation.create');
Route::post('/formation', [FormationController::class, 'store'])->name('superadmin.formation.store');
Route::get('/formation/{id}/edit', [FormationController::class, 'edit'])->name('superadmin.formation.edit');
Route::put('/formation/{id}', [FormationController::class, 'update'])->name('superadmin.formation.update');
Route::delete('/formation/{id}', [FormationController::class, 'destroy'])->name('superadmin.formation.destroy');
Route::get('/liaison', [FormationController::class,'liaison'])->name('superadmin.formation.liaison');
Route::delete('/liaison/{formation}/{etablissement}', [FormationController::class,'detach'])->name('superadmin.formation.detach');

// route gestion des enquetes 
    Route::prefix('enquete')->name('superadmin.enquete.')->group(function () {
        // route afficher les enquetes
        // la route se construit comme ça => va chercher la methode listeEnquete de la classe EnqueteController dans le controller Enquete 
        Route::get('lister',[EnqueteController::class,'index'])
            -> name('index');
            
            // route suppression d'enquete
            Route::delete('supprimer/{id}', [EnqueteController::class, 'destroy'])
            -> where('id', '[0-9]+')->name('delete')->middleware(['auth', 'is_admin', 'is_super_admin']); 

            // route pour modifier, 1 pour afficher les données dans le formulaire et l'autre pour les modifier. 
            Route::get('modifier/{id}', [EnqueteController::class, 'edit'])
            -> name('edit')->middleware(['auth', 'is_admin', 'is_super_admin']); 

            Route::put('update/{id}', [EnqueteController::class, 'update']) 
            -> name('update')->middleware(['auth', 'is_admin', 'is_super_admin']); 

            // route pour l'ajout, la première pour afficher les données et la deuxieme pour les modifier 
            Route::get('ajouter', [EnqueteController::class,'create'])
            -> name('create')->middleware(['auth', 'is_admin', 'is_super_admin']); 

            Route::post('store',[EnqueteController::class,'store']) 
            -> name('store')->middleware(['auth', 'is_admin', 'is_super_admin']); 

    }); 

// routes echanges
Route::middleware('auth')->group(function () {
    Route::get('/echange.index', [EchangeController::class, 'index'])->name('superadmin.echange.index');
    Route::post('/echanges', [EchangeController::class, 'store'])->name('superadmin.echange.store');
    Route::get('/echange/{id}/edit', [EchangeController::class, 'edit'])->name('superadmin.echange.edit');
    Route::put('/echange/{id}', [EchangeController::class, 'update'])->name('superadmin.echange.update');
    Route::delete('/echange/{id}', [EchangeController::class, 'destroy'])->name('superadmin.echange.destroy');
});
require __DIR__.'/auth.php';
    
