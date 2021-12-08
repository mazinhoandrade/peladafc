<?php

namespace Database\Factories;

use App\Models\Atleta;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtletaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atleta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'posisao' => random_int(1,5),
            'data_aniversario' => $this->faker->date,
            'avatar' => $this->faker->imageUrl(126,126,'people'),

        ];
    }
}
