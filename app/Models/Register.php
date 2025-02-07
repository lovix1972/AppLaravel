<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    protected $table = 'registers';
    protected $fillable = [

        'idreparto',
        'reparto',
        'numpds',
        'datapds',
        'oggetto',
        'idcapitolo',
        'capitolo',
        'art',
        'prog',
        'idv',
        'decreto',
        'importo',
        'previstoimpegno',
        'impegnato',
        'contabilizzato',
        'note',

    ];
}
