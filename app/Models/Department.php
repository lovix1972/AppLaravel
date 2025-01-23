<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 *
 * @property int|null $id
 * @property int|null $idreparto
 * @property string|null $reparto
 * @property string|null $regione
 * @property string|null $citta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCitta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereIdreparto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereRegione($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereReparto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = [
        'idreparto',
        'reparto',
        'regione',
        'citta',
    ];

    public function capitoli()
    {
        return $this->hasMany(Capitolo::class);
    }
}
