<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotor;

class PromotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotor::factory(30)->create();
    }
}
