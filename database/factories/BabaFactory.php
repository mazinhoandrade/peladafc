<?php

namespace Database\Factories;

use App\Models\Baba;
use Illuminate\Database\Eloquent\Factories\Factory;

class BabaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Baba::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->word
        ];
    }
}
