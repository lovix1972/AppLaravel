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
        'reparto',
        'capitolo',
        'art',
        'prog',
        'idv',
        'decreto',
        'anno',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'idreparto', 'idreparto');
    }
}
