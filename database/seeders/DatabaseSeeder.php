<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          //  CategoriaSeeder::class,
           // ProductoSeeder::class,
            UserSeeder::class,
            PromotorSeeder::class,
            PedidoSeeder::class,
            CompraSeeder::class,
        ]);
    }
}
