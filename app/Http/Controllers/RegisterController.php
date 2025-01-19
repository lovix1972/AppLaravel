<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   //
    }
    public function reglist()
    {
     Register::all();
     $register = Register::all();
        return view('pages.reglist',['register' => $register]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ShowFormInspds()
    {
        $reparti=Department::all();
        return view('pages.inspds', ['reparti' => $reparti]);
    }

    public function getreparto()
    {
        $reparti=Department::all();
        return view('pages.inspds', ['reparti' => $reparti]);

    }



    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'reparto' => 'required|string|max:255',
            'numpds' => 'string',
            'datapds' => 'date',
            'oggetto' => 'string|max:255',
            'idcapitolo' => 'required|int',
            'capitolo' => 'required|int|min:4',
            'art'=> 'required|int|min:1',
            'prog'=>'required|int|min:2',
            'idv'=>'required|int|min:7',
            'decreto'=>'required|string|max:50',
            'importo'=>'required|decimal:2',
            'previstoimpegno'=>'required|decimal:2',
            'impegnato'=>'decimal:2',
            'contabilizzato'=>'decimal:2',
            'note'=>'string|max:255',

        ]);
        //dd($request);
         Register::create ([
            'reparto'=>$validatedData['reparto'],
            'numpds'=>$validatedData['numpds'],
            'datapds'=>$validatedData['datapds'],
            'oggetto'=>$validatedData['oggetto'],
            'idcapitolo'=>$validatedData['idcapitolo'],
            'capitolo'=>$validatedData['capitolo'],
            'art'=>$validatedData['art'],
            'prog'=>$validatedData['prog'],
            'idv'=>$validatedData['idv'],
            'decreto'=>$validatedData['decreto'],
            'importo'=>$validatedData['importo'],
            'previstoimpegno'=>$validatedData['previstoimpegno'],
            'impegnato'=>$validatedData['impegnato'],
            'contabilizzato'=>$validatedData['contabilizzato'],
            'note'=>$validatedData['note'],

        ]);
        $reparti=Department::all();
        return view('pages.inspds', ['reparti' => $reparti])->with('success',"Inserimento eseguito con successo!");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( Register $id)
    {
       $register=Register::find($id);
     return view('pages.modifica', compact('register'));
    }



    public function delete(int $id)
    {
        $sql='DELETE from registers where id=:id';
       return db::delete($sql, ['id'=>$id]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //return view('pages.modifica')->withRegister($register);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
$request->validate([
    'reparto' => 'required|string|max:255',
    'numpds' => 'string',
    'datapds' => 'date',
    'oggetto' => 'string|max:255',
]);

$update=Register::find($id);
$update->update ($request->all());
return redirect()->route('reglist')->with('success',"Modificazione eseguita con successo!");




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

}
