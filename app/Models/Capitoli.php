<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capitoli extends Model
{
    use HasFactory;

    use softDeletes;
    protected $table = 'capitoli';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'capitolo',
        'art',
        'prog'

    ];

    public function register(): HasMany
{
    return $this->hasMany(Register::class );
}
}

