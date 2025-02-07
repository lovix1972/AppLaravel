<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class RepartoController extends Controller
{
    /**
     * Display the specified resource.
     */


    public function showReparti(Request $request)
    {
        $reparti = Department::all();

        return view('pages.login', ['reparti' => $reparti]);

    }


    public function showRepartiFormRegister()
    {
        $reparti = Department::all();

        return view('pages.register', ['reparti' => $reparti]);

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idreparto' => 'required|integer',
            'reparto' => 'required|string',
            'regione' => 'required|string',
            'citta' => 'required|string']);

        Department::create([
            'idreparto' => $validatedData['idreparto'],
            'reparto' => $validatedData['reparto'],
            'regione' => $validatedData['regione'],
            'citta' => $validatedData['citta'],
        ]);

        return redirect()->route('insertReparto')->with('success', 'Registrazione avvenuta con successo');

    }
}
