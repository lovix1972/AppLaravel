<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Mostra l'elenco di tutti i PDS registrati.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera tutti i PDS dal modello Register.
        // Puoi aggiungere `paginate(10)` per la paginazione, se necessario.
        $pds = Register::all();

        // Passa la collezione di PDS alla vista.
        return view('pds.index', compact('pds'));
    }

    // Aggiungi qui gli altri metodi (store, update, destroy) per gestire le rotte.
    // ...


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
        'id_pds' => 'nullable|string|max:255',
        'numpds' => 'required|string|max:255',
        'datapds' => 'required|date',
        'n_protocollo' => 'required|string|max:255',
        'idreparto' => 'required|integer|exists:departments,idreparto',
        'reparto' => 'required|string|max:255',
        'oggetto' => 'required|string',
        'idcapitolo' => 'required|integer|exists:capitoli,idcapitolo',
        'capitolo' => 'required|string|max:255',
        'art' => 'required|string|max:255',
        'prog' => 'required|string|max:255',
        'idv' => 'nullable|string|max:255',
        'decreto' => 'nullable|string|max:255',
        'ops' => 'nullable|string|max:255',
        'descrizione' => 'nullable|string|max:255',
        'pdc' => 'nullable|string|max:255',
        'importo' => 'nullable|numeric|min:0',
        'previstoimpegno' => 'nullable|numeric|min:0',
        'impegnato_valore' => 'nullable|numeric|min:0',
        'contabilizzato_valore' => 'nullable|numeric|min:0',
        'registrato' => 'boolean',
        'impegnato_flag' => 'boolean',
        'validato' => 'boolean',
        'note' => 'nullable|string',
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
        'contabilizzato' => $validatedData['contabilizzato_valore'] ?? 0.00,
        'registrato' => $validatedData['registrato'] ?? false,
        'impegnato_flag' => $validatedData['impegnato_flag'] ?? false,
        'validato' => $validatedData['validato'] ?? false,
        'note' => $validatedData['note'] ?? null,
    ];

    // 3. Crea un nuovo record nel database
    Register::create($pdsData);

    // 4. Reindirizza l'utente con un messaggio di successo
    return redirect()->route('pds.index')->with('success', 'PDS acquisito con successo.');
}
    /**
     * Aggiorna un Pds esistente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $pds
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Register $pds)
    {
//@dd($request->all());
        // 1. Validazione dei dati della richiesta
        $validatedData = $request->validate([
            'numpds' => 'nullable|string|max:255',
            'datapds' => 'required|date',
            'reparto' => 'nullable|string|max:255',
            'capitolo' => 'nullable|string|max:255',
            'art' => 'nullable|string|max:255',
            'prog' => 'nullable|string|max:255',
            'oggetto' => 'nullable|string',
            'anno' => 'nullable|integer',
        ]);

        // 2. Aggiornamento del modello Pds con i dati validati
        $pds->update($validatedData);

        // 3. Reindirizzamento dell'utente con un messaggio di successo
        return redirect()->route('pds.index')->with('success', 'PDS aggiornato con successo.');
    }
}

