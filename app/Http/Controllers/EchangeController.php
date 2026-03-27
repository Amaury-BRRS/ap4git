<?php

namespace App\Http\Controllers;

use App\Models\Echange;
use App\Models\Enquete;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Contrôleur pour gérer les échanges (contacts entre utilisateurs, enquêtes et participants)
 */
class EchangeController extends Controller
{
    /**
     * Afficher la liste des échanges avec pagination et relations chargées
     */
    public function index()
    {
        // Récupérer tous les échanges avec leurs relations pour éviter les N+1 queries
        $echanges = Echange::with(['user','enquete','participant'])->latest()->get();
        
        // Charger les données pour les selects du formulaire
        $users = User::all();
        $enquetes = Enquete::all();
        $participants = Participant::all();
        
        return view('echange.index', compact('echanges', 'users', 'enquetes', 'participants'));
    }

    /**
     * Afficher le formulaire de création (redirigé vers index pour simplicité)
     */
    public function create()
    {
       
    }

    /**
     * Stocker un nouvel échange en base
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        $data = $request->validate([
            'type' => ['required','string','max:255'],                    // Type requis
            'date_de_contact' => ['required','date','after:1900-01-01'], // Date valide après 1900
            'user_id' => ['required','exists:users,id'],                 // Utilisateur existant
            'enquete_id' => ['required','exists:enquetes,id'],           // Enquête existante
            'participant_id' => ['required','exists:participants,id'],   // Participant existant
        ]);

        // Créer l'échange
        Echange::create($data);
        
        // Rediriger avec message de succès
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange créé !');
    }

    /**
     * Afficher les détails d'un échange (non implémenté)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Afficher le formulaire d'édition d'un échange
     */
    public function edit(string $id)
    {
         // Récupérer l'échange à modifier
         $echange = Echange::findOrFail($id);
         
         // Charger les données pour les selects
         $users = User::all();
         $enquetes = Enquete::all();
         $participants = Participant::all();
         
         return view('echange.edit', compact('echange', 'users', 'enquetes', 'participants'));
    }

    /**
     * Mettre à jour un échange existant
     */
    public function update(Request $request, string $id)
    {
        // Validation identique à store
        $data = $request->validate([
            'type' => ['required','string','max:255'],
            'date_de_contact' => ['required','date','after:1900-01-01'],
            'user_id' => ['required','exists:users,id'],
            'enquete_id' => ['required','exists:enquetes,id'],
            'participant_id' => ['required','exists:participants,id'],
        ]);

        // Trouver et mettre à jour
        $echange = Echange::findOrFail($id);
        $echange->update($data);
        
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange mis à jour !');
    }

    /**
     * Supprimer un échange
     */
    public function destroy(string $id)
    {
        // Trouver et supprimer
        $echange = Echange::findOrFail($id);
        $echange->delete();
        
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange supprimé !');
    }
}
