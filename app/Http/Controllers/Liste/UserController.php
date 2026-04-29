<?php

namespace App\Http\Controllers\liste;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $users = User::all();
            return view('liste_utilisateurs.user', compact('users'));
        }

    /**
     * Display a listing of admin users.
     */
        public function admin()
        {
            $users = User::where('type_user', 'administrateur')->get();
            return view('liste_utilisateurs.admin', compact('users'));
        }

    /**
     * Display a listing of superadmin users.
     */
        public function superadmin()
        {
            $users = User::where('type_user', 'super_administrateur')->get();
            return view('liste_utilisateurs.superadmin', compact('users'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateRole(Request $request, string $id)
    {
        //validation des données
        $request->validate([
            'is_admin' => 'boolean',
            'is_super_admin' => 'boolean',
        ]);

        // Trouver l'utilisateur grâce à son ID
        $user = User::findOrFail($id);

        // Vérifier les droits (seul superadmin peut faire des modifications)
        if (!auth()->user()->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Vous n\'avez pas les permissions nécessaires pour modifier cet utilisateur.');
        }

        //Empêcher la modification de soi-même
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas modifier votre propre rôle.');
        }

        // Mettre à jour les rôles de l'utilisateur
        if ($request->is_superadmin) {
            $user->type_user = 'super_administrateur';
        } elseif ($request->is_admin) {
            $user->type_user = 'administrateur';
        } else {
            $user->type_user = 'salarié';
        }
        $user->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Rôle de l\'utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Trouver l'utilisateur par son ID
        $user = User::findOrFail($id);
        
        // Vérifier si l'utilisateur connecté a le droit de supprimer (ex: super admin seulement)
        if(!auth()->user()->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Vous n\'avez pas les permissions nécessaires pour supprimer cet utilisateur.');
        }

        // Empêcher la suppression de soi-même
        if ($user->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        // Supprimer l'utilisateur
        $user->delete();

         // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');

    }
}
