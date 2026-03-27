<?php

namespace App\Http\Controllers;

use App\Http\Request\FormationRequest;
use App\Models\Formation;
use App\Models\Etablissement;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with('etablissement')->get();
        return view('superadmin.formation.index', compact('formations'));
    }

    public function create()
    {
        return view('superadmin.formation.create');
    }

    public function store(FormationRequest $request)
    {
        try {
            $formation = new Formation();
            $formation->libelle = $request->input('libelle');
            $formation->save();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la formation.');
        }
        
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
            $formation->save();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de la formation.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            $formation = Formation::findOrFail($id);
            $formation->delete();
            return redirect()->route('superadmin.formation.index')->with('success', 'Formation supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de la formation.');
        }
    }

    public function liaison()
    {
        $formations = Formation::with('etablissement')->whereHas('etablissement')->get();
        return view('superadmin.formation.liaison', compact('formations'));
    }

    public function detach($formationId, $etablissementId)
    {
        try {
        $formation = Formation::findOrFail($formationId);
        $formation->etablissement()->detach($etablissementId);
        return redirect()->route('superadmin.formation.liaison')->with('success', 'L\'établissement a été détacher avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors du détachement de l\'entreprise.');
        }
    }
}
