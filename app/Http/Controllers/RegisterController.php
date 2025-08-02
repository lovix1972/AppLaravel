<?php

namespace App\Http\Controllers;

use App\Models\Capitolo;
use App\Models\Department;
use App\Models\Register;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Mostra l'elenco di tutti i PDS registrati.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Register::orderBy('datapds', 'desc');

        // Applica il filtro di ricerca se sono presenti i parametri nella richiesta
        if ($request->has('search_key') && $request->has('search_value')) {
            $searchKey = $request->input('search_key');
            $searchValue = $request->input('search_value');

            if ($searchKey && $searchValue) {
                // Utilizza 'like' per una ricerca parziale più flessibile
                $query->where($searchKey, 'like', '%' . $searchValue . '%');
            }
        }

        $pds = $query->paginate(20);

        $capitoli = Capitolo::all();
        $departments = Department::all();

        return view('pds.index', compact('pds', 'capitoli', 'departments'));

    }




/**
 * Mostra il form di modifica per un PDS specifico.
 *
 * @param  \App\Models\Register  $pds
 * @return \Illuminate\View\View
 */
public function edit(Register $pds)
    {
    // La Route Model Binding di Laravel inietta il PDS corretto automaticamente.
    // Questa funzione ora passa il singolo oggetto $pds a una vista.

    // Puoi ritornare la vista completa o una vista parziale per la modale.
    return view('pds.edit', compact('pds'));
    }





/**
 * Salva un nuovo PDS nel database.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function store(Request $request)
{
    // 1. Validazione dei dati della richiesta
    $validatedData = $request->validate([
        'id' => 'nullable|string|max:255',
        'numpds' => 'required|string|max:255',
        'datapds' => 'required|date',
        'n_protocollo' => 'required|string|max:255',
        'idreparto' => 'required|integer|exists:departments,idreparto',
        'reparto' => 'required|string|max:255',
        'oggetto' => 'required|string',
        'idcapitolo' => 'required|integer|exists:capitoli,idcapitolo',
        'capitolo' => 'required|integer|min:4',
        'art' => 'required|integer|min:2',
        'prog' => 'required|integer|min:2',
        'idv' => 'nullable|integer',
        'decreto' => 'nullable|string|max:255',
        'ops' => 'nullable|string|max:255',
        'descrizione' => 'nullable|string|max:255',
        'pdc' => 'nullable|string|max:255',
        'importo' => 'nullable|numeric|min:0',
        'previstoimpegno' => 'nullable|numeric|min:0',
        'impegnato' => 'nullable|numeric|min:0',
        'contabilizzato' => 'nullable|numeric|min:0',
        'registrato' => 'boolean',
        'impegnato_flag' => 'boolean',
        'validato' => 'boolean',
        'note' => 'nullable|string',
        'anno' => 'nullable|integer'
    ]);

    // 2. Mappatura dei dati validati ai nomi delle colonne del database
    $pdsData = [
        'idpds' => $validatedData['idpds'] ?? null,
        'num_pds' => $validatedData['numpds'],
        'datapds' => $validatedData['datapds'],
        'num_protocollo' => $validatedData['n_protocollo'],
        'idreparto' => $validatedData['idreparto'],
        'reparto' => $validatedData['reparto'],
        'oggetto' => $validatedData['oggetto'],
        'idcapitolo' => $validatedData['idcapitolo'],
        'capitolo' => $validatedData['capitolo'],
        'art' => $validatedData['art'],
        'prog' => $validatedData['prog'],
        'idv' => $validatedData['idv'] ?? null,
        'decreto' => $validatedData['decreto'] ?? null,
        'ops' => $validatedData['ops'] ?? null,
        'descrizione' => $validatedData['descrizione'] ?? null,
        'pdc' => $validatedData['pdc'] ?? null,
        'importo' => $validatedData['importo'] ?? 0.00,
        'previstoimpegno' => $validatedData['previstoimpegno'] ?? 0.00,
        'impegnato' => $validatedData['impegnato'] ?? 0.00,
        'contabilizzato' => $validatedData['contabilizzato'] ?? 0.00,
        'registrato' => $validatedData['registrato'] ?? false,
        'impegnato_flag' => $validatedData['impegnato_flag'] ?? false,
        'validato' => $validatedData['validato'] ?? false,
        'note' => $validatedData['note'] ?? null,
        'anno' => $validatedData['anno'] ?? null,
    ];

    // 3. Crea un nuovo record nel database
    Register::create($pdsData);

    // 4. Reindirizza l'utente con un messaggio di successo
    return redirect()->route('pds.index')->with('success', 'PDS acquisito con successo.');
}



    public function update(Request $request, $id)
    {



        $importoPulito = str_replace(['€', '.', ' '], '', $request->input('importo'));
        $importoPulito = str_replace(',', '.', $importoPulito);
        $request->merge(['importo' => $importoPulito]);

        $pds= Register::findOrFail($id);
        // 1. Validazione dei dati della richiesta
        $validatedData = $request->validate([

            'numpds' => 'required|string|max:255',
            'datapds' => 'required|date',
            'idreparto'=> 'required|integer|exists:departments,idreparto',
            'reparto' => 'required|string|max:255',
            'idcapitolo'=> 'required|integer|exists:capitoli,idcapitolo',
            'capitolo' => 'required|integer|min:4',
            'art' => 'required|integer|min:2',
            'prog' => 'required|integer|min:2',
            'idv' => 'nullable|integer',
            'note' => 'nullable|string',

            'oggetto' => 'required|string',
            'importo' => 'nullable|numeric',
            'anno' => 'nullable|integer'
        ]);


        // 2. Aggiornamento del modello Pds con i dati validati
        $pds->update($validatedData);



        return redirect()->route('pds.index')->with('success', 'PDS aggiornato con successo.');
    }
    public function destroy($id)
    {

            $pds=Register::findOrFail($id);
            $pds->delete();
            return redirect()->route('pds.index')->with('success', 'PDS eliminato con successo.');

    }
    public function show()
    {

        $capitoli = Capitolo::all();
        $department = Department::all();

        // Passa tutte le collezioni alla vista
        return view('pages.inspds', compact( 'capitoli', 'department'));
    }

    public function updateStatus(Request $request, Register $pds)
    {
        // 1. Valida i dati della richiesta
        $validated = $request->validate([
            'field' => 'required|string|in:registrato,impegnato',
            'status' => 'required|boolean',
        ]);

        // 2. Aggiorna il campo corretto
        // Converti il booleano in -1 o 0 come richiesto
        $value = $validated['status'] ? -1 : 0;

        $pds->update([
            $validated['field'] => $value,
        ]);

        // 3. Restituisci una risposta di successo
        return response()->json(['message' => 'Stato aggiornato con successo.']);
    }

}

