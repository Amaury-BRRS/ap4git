<?php

namespace App\Http\Controllers;

use App\Models\Echange;
use App\Models\Enquete;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

class EchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $echanges = Echange::with(['user','enquete','participant'])->latest()->get();
        $users = User::all();
        $enquetes = Enquete::all();
        $participants = Participant::all();
        return view('echange.index', compact('echanges', 'users', 'enquetes', 'participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required','string','max:255'],
            'date_de_contact' => ['required','date'],
            'user_id' => ['required','exists:users,id'],
            'enquete_id' => ['required','exists:enquetes,id'],
            'participant_id' => ['required','exists:participants,id'],
        ]);

        Echange::create($data);
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange créé !');
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
         $echange = Echange::findOrFail($id);
         $users = User::all();
         $enquetes = Enquete::all();
         $participants = Participant::all();
         return view('echange.edit', compact('echange', 'users', 'enquetes', 'participants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'type' => ['required','string','max:255'],
            'date_de_contact' => ['required','date'],
            'user_id' => ['required','exists:users,id'],
            'enquete_id' => ['required','exists:enquetes,id'],
            'participant_id' => ['required','exists:participants,id'],
        ]);

        $echange = Echange::findOrFail($id);
        $echange->update($data);
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $echange = Echange::findOrFail($id);
        $echange->delete();
        return redirect()->route('superadmin.echange.index')->with('success', 'Echange supprimé !');
    }
}
