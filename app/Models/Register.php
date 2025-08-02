<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Register extends Model
{
    use HasFactory;
    protected $table = 'registers';
    protected $primaryKey = 'id';
    protected $fillable = [

        'numpds',
        'idreparto',
        'reparto',
        'datapds',
        'idv',
        'decreto',
        'idcapitolo',
        'capitolo',
        'art',
        'prog',
        'oggetto',
        'importo',
        'previstoimpegno',
        'impegnato',
        'contabilizzato',
        'anno',
        'impegnato_flag',
        'registrato',
        'validato'

    ];

}
