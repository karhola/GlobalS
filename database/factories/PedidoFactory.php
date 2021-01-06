<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_entrega' => $this->faker->date($format='Y-m-d', $max='now'),
            'fecha_devolucion' => $this->faker->date($format='Y-m-d',$max='now'),
            'total_cantidad_retenida' => $this->faker->randomNumber($nbDigits = 3),
            'total_cantidad_devuelta' => $this->faker->randomNumber($nbDigits = 3),
            'estado_p' => $this->faker->boolean,
        ];
    }
}
