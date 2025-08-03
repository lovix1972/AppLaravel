<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'idreparto',
        'reparto',
        'regione',
        'citta',
    ];

    public function capitolo()
    {
        // Supponendo che la chiave esterna sia 'idreparto' nella tabella 'preavvisi'
        // e la chiave locale sia 'idreparto' nella tabella 'departments'.
        return $this->belongsTo(Capitolo::class, 'id', 'id');
    }
}
