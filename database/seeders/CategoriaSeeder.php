<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre_categoria' => 'Cocina'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Educativos'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Bazar'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Ferreteria'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Jugueteria'
        ]);
        Categoria::create([
            'nombre_categoria' => 'Utensilios'
        ]);
    }
}
