<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdsRegisters extends Model
{

    protected $fillable = [
        'id_pds',
        'numpds',
        'datapds',
        'protocollo',
        'oggetto',
        'idcapitolo',
        'capitolo',
        'particolo',
        'programma',
        'idv',
    'decreto'

    ];
}
