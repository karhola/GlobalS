<?php

namespace Database\Factories;

use App\Models\Promotor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_promotor' => $this->faker->firstName,
            'apellido_promotor' => $this->faker->lastName,
            'direccion_promotor' => $this->faker->address,
            'celular_promotor' => $this->faker->randomNumber($nbDigits=8),
            'fecha_nacimiento' => $this->faker->date($format= 'Y-m-d', $max='now'),
            'ci_promotor' => $this->faker->randomNumber($nbDigits=8),
        ];
    }
}
