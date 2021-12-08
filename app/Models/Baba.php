<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Baba
 *
 * @property int $id
 * @property string|null $data
 * @property int|null $parti
 * @method static \Illuminate\Database\Eloquent\Builder|Baba newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Baba newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Baba query()
 * @method static \Illuminate\Database\Eloquent\Builder|Baba whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baba whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Baba whereParti($value)
 * @mixin \Eloquent
 */
class Baba extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'babas';
    public $primaryKey = 'id';

    protected $fillable = [
        'descricao',
        'created_at',
        'updated_at'
    ];

    public function atletas()
    {
        return $this
            ->belongsToMany(Atleta::class, 'atleta_babas', 'baba_id', 'atleta_id');
    }

     public function filtroBabas()
    {
        return $this
            ->belongsToMany(Atleta::class, 'atleta_babas','baba_id', 'atleta_id')
            ->withPivot('gols','assistecias','falhas','is_veceu_baba');
    }

    public function filtroMelhores() {
        return $this
            ->belongsToMany(Atleta::class, 'atleta_babas', 'baba_id', 'atleta_id')
            ->where('atleta_babas.is_veceu_baba', '>', 0 );
    }

    /**
     * função que receber o id e rertona o nome do atleta, usada na view "admin.baba.edit"
     * @param int $id
     * @return o nome do atleta
     */
    public static function nomeAtleta(int $id)
    {
        $atleta = Atleta::find($id);
        return $atleta->nome;
    }


}
