<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitolo extends Model
{
    use HasFactory;
    protected $table = 'capitoli';
    protected $primaryKey = 'id';


    protected $fillable = [
        'idcapitolo',
        'idreparto',
        'reparto',
        'capitolo',
        'art',
        'prog',
        'idv',
        'decreto',
        'preavviso',
        'anno',
    ];



    public function department()
    {
        // Supponendo che la chiave esterna sia 'idreparto' nella tabella 'preavvisi'
        // e la chiave locale sia 'idreparto' nella tabella 'departments'.
        return $this->belongsTo(Department::class, 'id', 'id');
    }}
