<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AtletaBaba extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'atleta_id',
            'baba_id',
            'gols',
            'falhas',
            'assistecias',
            'is_veceu_baba'
        ];



}
