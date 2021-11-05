<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;
    const PATH_FILE = 'media/imgat';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'posi',
        'data',
        'avatar'
    ];

    public function getAvatarAttribute()
    {
        if(empty($this->attributes['avatar']))
        {
            return 'default.png';
        }

        return $this->attributes['avatar'];
    }


}
