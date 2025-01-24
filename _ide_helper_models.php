<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int|null $idcapitolo
 * @property int|null $idreparto
 * @property int|null $idfascicolo
 * @property string|null $ufficio
 * @property int|null $capitolo
 * @property int|null $art
 * @property int|null $prog
 * @property string|null $PDC
 * @property float|null $IDV
 * @property string|null $Descrizione
 * @property string|null $OPS2
 * @property float|null $prevvisi
 * @property string|null $Decreto
 * @property int|null $Anno
 * @property int|null $Contrattualizzabile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Register> $register
 * @property-read int|null $register_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereAnno($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereCapitolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereContrattualizzabile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereDecreto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereDescrizione($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereIDV($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereIdcapitolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereIdfascicolo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereIdreparto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereOPS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli wherePDC($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli wherePrevvisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereProg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli whereUfficio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Capitoli withoutTrashed()
 */
	class Capitoli extends \Eloquent {}
}

namespace App\Models{
/**
 * The attributes that are mass assignable.
 *
 * @var array<int, string>
 * @property int|null $id
 * @property int|null $idreparto
 * @property string|null $reparto
 * @property string|null $regione
 * @property string|null $citta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
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
 */
	class Register extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $reparto
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereReparto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

