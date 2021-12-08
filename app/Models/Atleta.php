<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Atleta
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $posi
 * @property string|null $data
 * @property string|null $avatar
 * @property int|null $falhas
 * @property int|null $gols
 * @property int|null $assis
 * @property int|null $capa
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereAssis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereCapa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereFalhas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereGols($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Atleta wherePosi($value)
 * @mixin \Eloquent
 */
class Atleta extends Model
{


    use HasFactory;

    const PATH_FILE = 'media/imgat';
    protected $table = 'atletas';
    public $timestamps = false;
    public $primaryKey = 'id';


    /**
     * @var string[]
     */
    protected $fillable = [
        'nome',
        'posisao',
        'data_aniversario',
        'avatar'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function babas()
    {
        return $this
            ->belongsToMany(Baba::class, 'atleta_babas', 'atleta_id', 'baba_id');
    }

    public function atletasBabas()
    {
        return $this->hasMany(AtletaBaba::class, 'atleta_id');
    }

//    public function atleta()
//    {
//        return $this->belongsTo(Baba::class);
//    }
//
//    public function scopeFilterAtletas($query, $var)
//    {
//        if (! $var) return;
//
//        $query->orWhereHas('atleta_babas', function($q) use ($var) {
//            $q->where('is_veceu_baba', '>', 0);
//        });
//    }

    /**
     * Funcão que retorna a posição do atleta
     * @param int|null $n
     * @return string "Com o nome da posição"
     */
    public static function posicao(int $n = null)
    {
        if ($n === 1) {
            return "Goleiro";
        } elseif ($n === 2) {
            return "Fixo";
        } elseif ($n === 3) {
            return "Ala Esquerda";
        } elseif ($n === 4) {
            return "Ala Direita";
        } else {
            return "Pivô";
        }
    }

    public function getAvatarAttribute()
    {
        if (empty($this->attributes['avatar'])) {
            return 'default.png';
        }

        return $this->attributes['avatar'];
    }


}
