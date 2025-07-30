<?php

namespace App\Http\Controllers;


use App\Models\Capitolo;
use App\Models\Department;
use Illuminate\Http\Request;


class SelectController extends Controller
{
    public function showReparti()
    {
        $department = Department::all();
        $capitoli = Capitolo::all();

        return view('pages.inspds', compact('department' , 'capitoli'));

    }
    public function getCapitoliByReparto(Request $request)
    {
        $idReparto = $request->input('idreparto');

        if ($idReparto) {
            $capitoli = Capitolo::where('idreparto', $idReparto)->get();
        } else {
            $capitoli = Capitolo::all(); // O un array vuoto se non vuoi mostrare nulla senza filtro
        }

        return response()->json($capitoli);
    }
}
