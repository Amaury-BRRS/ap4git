<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;

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
        public function store(Request $request)
        {
            try {
            $request->validate([
                'nom' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'code_postal' => 'required',
                'email' => 'required|email',
                'telephone' => 'required',
            ]);
            Etablissement::create($request->all());
            return redirect()->route('superadmin.etablissement.etablissement')->with('success', 'Etablissement créé avec succès.');
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
            //
        }
    
        /**
        * Update the specified resource in storage.
        */
        public function update(Request $request, string $id)
        {
            //
        }
    
        /**
        * Remove the specified resource from storage.
        */
        public function destroy(string $id)
        {
            //
        }
}
