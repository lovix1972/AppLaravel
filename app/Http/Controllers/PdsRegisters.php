<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdsRegisters extends Controller
{
    public function pdsRegister()
    {
        PdsRegisters::create([
        'numpds'=>'150',
            'oggetto'=>'Prova inserimento'
            ]);
    }
}
