<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 */
class Department extends Model
{
    protected $fillable = [
        'idreparto',
        'reparto',
        'regione',
        'citta'
    ];
}
