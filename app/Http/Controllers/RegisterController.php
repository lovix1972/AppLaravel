<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Register;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{


    public function index()
    {
if(Auth::check()) {


        $register=Register::all();
        return view('pages.reglist',['register'=>$register]);
    }else{
    return redirect()->route('/login');
}

    }


   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idreparto' => 'required|int',
            'reparto' => 'required|string|max:255',
            'numpds' => 'string',
            'datapds' => 'date',
            'oggetto' => 'string|max:255',
            'idcapitolo' => 'required|int',
            'capitolo' => 'required|int|min:4',
            'art' => 'required|int|min:1',
            'prog' => 'required|int|min:2',
            'idv' => 'required|int|min:7',
            'decreto' => 'required|string|max:50',
            'importo' => 'required|decimal:2',
            'previstoimpegno' => 'required|decimal:2',
            'impegnato' => 'decimal:2',
            'contabilizzato' => 'decimal:2',
            'note' => 'string|max:255',

        ]);
        //dd($request);
        Register::create([
            'idreparto' => $validatedData['idreparto'],
            'reparto' => $validatedData['reparto'],
            'numpds' => $validatedData['numpds'],
            'datapds' => $validatedData['datapds'],
            'oggetto' => $validatedData['oggetto'],
            'idcapitolo' => $validatedData['idcapitolo'],
            'capitolo' => $validatedData['capitolo'],
            'art' => $validatedData['art'],
            'prog' => $validatedData['prog'],
            'idv' => $validatedData['idv'],
            'decreto' => $validatedData['decreto'],
            'importo' => $validatedData['importo'],
            'previstoimpegno' => $validatedData['previstoimpegno'],
            'impegnato' => $validatedData['impegnato'],
            'contabilizzato' => $validatedData['contabilizzato'],
            'note' => $validatedData['note'],

        ]);
        return redirect()->route('reglist')->with('success',"Registrazione eseguita con successo!");
    }



    /**
     * Display the specified resource.
     */
    public function show( Register $id)
    {


       $register=Register::find($id);


        return view('pages.modifica', compact('register'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        return view('pages.modifica',['register'=>$register]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


    $update=Register::find($id);
    $update->update ($request->all());
    return redirect()->route('reglist')->with('success',"Modifica eseguita con successo!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $register = Register::findOrFail($id);
        $register->delete();
        return redirect('reglist')->with('success','PDS eliminato con successo');
    }

    private function middleware(string $string)
    {
        return redirect()->route('login');
    }


}
