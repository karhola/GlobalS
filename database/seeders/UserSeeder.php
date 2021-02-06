<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleAdmin = Role::create(['name' => 'Admin']);
        $rolePromotor = Role::create(['name' => 'Promotor']);        
        
        $admin = new User();
        $admin->name = 'karina';
        $admin->email = 'karina@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();

        $admin->assignRole($roleAdmin);

        $promotor = new User();
        $promotor->name = 'noelia';
        $promotor->email = 'noelia@gmail.com';
        $promotor->password = bcrypt('password');
        $promotor->save();

        $promotor->assignRole($rolePromotor);
    }
}

