<?php

namespace Database\Factories;

use App\Models\Atleta;
use App\Models\AtletaBaba;
use App\Models\Baba;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtletaBabaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AtletaBaba::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'atleta_id' => Atleta::all()->random()->id,
            'baba_id' => Baba::all()->random()->id,
            'gols' => random_int(0,8),
            'falhas' => random_int(0,8),
            'assistecias' => random_int(0,8),
            'is_veceu_baba' => random_int(0,1),

        ];
    }
}
