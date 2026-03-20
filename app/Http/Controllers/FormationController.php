<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationRequest;
use App\Models\Formation;
<<<<<<< HEAD
use App\Models\Etablissement;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with('etablissement')->get();
        return view('superadmin.formation.index', compact('formations'));
    }

=======

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return view('superadmin.formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
>>>>>>> origin/features/view/formation
    public function create()
    {
        return view('superadmin.formation.create');
    }

<<<<<<< HEAD
    public function store(FormationRequest $request)
    {
        // Validation et création de la formation
=======
    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationRequest $request)
    {
>>>>>>> origin/features/view/formation
        try {
            $formation = new Formation();
            $formation->libelle = $request->input('libelle');
            $formation->save();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la formation.');
        }
<<<<<<< HEAD
        
    }

    public function edit($id)
    {
        $formation = Formation::with('etablissement')->findOrFail($id);
        $etablissements = Etablissement::all();
        return view('superadmin.formation.edit', compact('formation', 'etablissements'));
    }

    public function update(FormationRequest $request, $id)
    {
        try {
            $formation = Formation::with('etablissement')->findOrFail($id);
            $formation->libelle = $request->input('libelle');
            $formation->etablissement()->syncWithoutDetaching($request->etablissement);
=======
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
        $formation = Formation::findOrFail($id);
        return view('superadmin.formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormationRequest $request, string $id)
    {
        try {
            $formation = Formation::findOrFail($id);
            $formation->libelle = $request->input('libelle');
>>>>>>> origin/features/view/formation
            $formation->save();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de la formation.');
        }
    }

<<<<<<< HEAD
    public function destroy($id)
    {
        // Suppression de la formation
        try {
            $formation = Formation::with('etablissement')->findOrFail($id);
            $formation->etablissement()->detach();
=======
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $formation = Formation::findOrFail($id);
>>>>>>> origin/features/view/formation
            $formation->delete();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de la formation.');
        }
    }
}
