<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    use HasFactory;
    protected $table = 'registers';
    protected $fillable = [

        'numpds',
        'idreparto',
        'reparto',
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
        'anno'

    ];
}
