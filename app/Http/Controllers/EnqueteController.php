<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquetes = Enquete::all(); 
        return view('superadmin.enquete.index', compact("enquetes")); 
        // return view('index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.enquete.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titre'        => 'required|string|max:255',
                'description'  => 'required|string',
                'public_cible' => 'required|integer',
                'date_debut'   => 'required|date',
                'date_fin'     => 'required|date|after:date_debut',
            ]);

            $enquete = new Enquete();
            $enquete->titre = $request->input('titre');
            $enquete->description  = $request->input('description');
            $enquete->public_cible = $request->input('public_cible');
            $enquete->date_debut   = $request->input('date_debut');
            $enquete->date_fin = $request->input('date_fin');
            $enquete->user_id = auth()->id();  
            $enquete->statut = 'en cours';   
            $dd; 
            $enquete->save();

            return redirect()->route('superadmin.enquete.index')
                            ->with('success', 'L\'enquête a été ajoutée avec succès');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            report($e); // log dans storage/logs/laravel.log
            return redirect()->back()
                            ->with('error', 'Echec de la création de l\'enquête')
                            ->withInput();
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
        $enquete = Enquete::find($id); 
        return view('superadmin.enquete.edit', compact('enquete')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $enquete = Enquete::find($id); 
            $enquete ->titre = $request->input('titre'); 
            $enquete -> description = $request->input('description'); 
            $enquete -> public_cible = $request->input('public_cible'); 
            $enquete -> date_debut = $request->input('date_debut'); 
            $enquete -> date_fin = $request->input('date_fin'); 
            $enquete -> user_id = $request->input('user_id'); 
            $enquete -> save(); 
            return redirect()->route('superadmin.enquete.edit')->with('succes', 'Enquete modifiée avec succès'); 
        }
        catch(\Exception $e)
        {
            return redirect()->route('superadmin.enquete.edit')->with('error', 'La modification n\'a pas aboutie'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $enquete = Enquete::findOrFail($id); 
           $enquete->delete(); 
            return redirect()-> route('superadmin.enquete.index')->with('success', 'Cette enquête a bien été supprimée'); 
        }
        catch(\Exception $e)
        {  return redirect()->route('superadmin.enquete.index')->with('success', 'Cette enquête n\'a pas pu être supprimée'); 
        }
    }
}
