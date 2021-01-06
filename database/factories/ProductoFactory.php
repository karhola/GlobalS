<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pfoto' => 'foto.jpg',
            'nombre_producto' => $this->faker->word,
            'descripcion_producto' => $this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'pcompra_producto' => $this->faker->randomNumber($nbDigits = 3 ),
            'pventa_producto' => $this->faker->randomNumber($nbDigits = 4 ),
            'stock_producto' => $this->faker->randomNumber($nbDigits = 2 ),
            'categoria_id' => Categoria::factory(),
            'activo' => $this->faker->randomNumber($nbDigits = 2 ),
            'fecha_caducidad' => $this->faker->date($format= 'Y-m-d', $max='now'),
            'beneficio_promotor' => $this->faker->randomNumber($nbDigits = 2 ),
            'beneficio_oficina' => $this->faker->randomNumber($nbDigits = 2 ),
        ];
    }
}
