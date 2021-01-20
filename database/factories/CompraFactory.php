<?php

namespace Database\Factories;
use App\Models\Proveedor;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Compra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cantidad_compra' => $this->faker->randomNumber($nbDigits = 3 ),
            'fecha_compra' => $this->faker->date($format= 'Y-m-d', $max='now'),
            'costo_importacion_total' => $this->faker->randomNumber($nbDigits = 3),
           
            'total_compra' => $this->faker->randomNumber($nbDigits = 3),
            'proveedor_id' => Proveedor::factory(),
        ];
    }
}
