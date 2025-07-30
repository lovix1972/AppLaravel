<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Capitolo extends Model
{
    use HasFactory;
    protected $table = 'capitoli';
    protected $fillable = [
    'idcapitolo',
    'idreparto',
    'descrizione',
    'ops',
    'idv'
];

}
