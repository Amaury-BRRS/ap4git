<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementRequest;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Formation;

class EtablissementController extends Controller
{
        /**
        * Display a listing of the resource.
        */
        public function index()
        {
            $etablissements = Etablissement::all();
            return view('superadmin.etablissement.index', compact('etablissements'));
        }
    
        /**
        * Show the form for creating a new resource.
        */
        public function create()
        {
            return view('superadmin.etablissement.create');
        }
    
        /**
        * Store a newly created resource in storage.
        */
        public function store(EtablissementRequest $request)
        {
            try {
                $etablissement = new Etablissement();
                $etablissement->nom = $request->input('nom');
                $etablissement->adresse = $request->input('adresse');
                $etablissement->ville = $request->input('ville');
                $etablissement->code_postal = $request->input('code_postal');
                $etablissement->email = $request->input('email');
                $etablissement->telephone = $request->input('telephone');
                $etablissement->save();
                return redirect()->route('superadmin.etablissement.index')->with('success', 'Etablissement créé avec succès.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'établissement.');
            }
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
            $etablissement = Etablissement::findOrFail($id);
            return view('superadmin.etablissement.edit', compact('etablissement'));
        }
    
        /**
        * Update the specified resource in storage.
        */
        public function update(EtablissementRequest $request,$id)
        {
            try {
                $etablissement = Etablissement::with('formation')->findOrFail($id);
                $etablissement->nom = $request->input('nom');
                $etablissement->adresse = $request->input('adresse');
                $etablissement->ville = $request->input('ville');
                $etablissement->code_postal = $request->input('code_postal');
                $etablissement->email = $request->input('email');
                $etablissement->telephone = $request->input('telephone');
                $etablissement->save();
                return redirect()->route('superadmin.etablissement.index')->with('success', 'Etablissement mis à jour avec succès.');
            }
            catch (\Exception $e) 
            {
                return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'établissement.');
            }
        }
    
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(string $id)
        {
            try {
            $etablissement = Etablissement::findOrFail($id);
            $etablissement->delete();
            return redirect()->route('superadmin.etablissement.index')->with('success', 'Etablissement supprimé avec succès.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'établissement.');
            }
        }
}
