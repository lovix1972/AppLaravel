<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $reparto
 * @property string|null $numpds
 * @property string $datapds
 * @property string $oggetto
 * @property int $idcapitolo
 * @property int $capitolo
 * @property int $art
 * @property int $prog
 * @property int $idv
 * @property string $decreto
 * @property string $importo
 * @property string $previstoimpegno
 * @property string $impegnato
 * @property string $contabilizzato
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereCapitolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereContabilizzato($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereDatapds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereDecreto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereIdcapitolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereIdv($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereImpegnato($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereImporto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereNumpds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereOggetto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register wherePrevistoimpegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereProg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereReparto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Register whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Register extends Model
{
    protected $fillable = [
        'id',
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
