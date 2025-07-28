<?php

namespace App\Http\Controllers;


use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


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
            'idcapitolo' => 'int',
            'capitolo' => 'required|int|min:4',
            'art' => 'required|int|min:1',
            'prog' => 'required|int',
            'idv' => 'required|int|min:7',
            'decreto' => 'string|max:50',
            'importo' => 'required|numeric',
            'previstoimpegno' => 'nullable|numeric',
            'impegnato_valore' => 'nullable|numeric',
            'contabilizzato_valore' => 'nullable|numeric',
            'registrato' => 'boolean', // Laravel convertirà 0/1 in false/true
            'impegnato_flag' => 'boolean', // Laravel convertirà 0/1 in false/true
            'validato' => 'boolean',
            'note' => 'nullable|string|max:255'

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
            'impegnato' => $validatedData['impegnato_valore'],
            'contabilizzato' => $validatedData['contabilizzato_valore'],
            'registrato' => $validatedData['registrato'],
            'impegnato_flag' => $validatedData['impegnato_flag'],
            'validato' => $validatedData['validato'],
            'note' => $validatedData['note']

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

    public function middleware($middleware, array $options = []): \Illuminate\Routing\ControllerMiddlewareOptions|\Illuminate\Http\RedirectResponse
    {
        return redirect()->route('login');
    }


}
