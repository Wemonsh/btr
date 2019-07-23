<?php

use Illuminate\Database\Seeder;
use App\Role;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'moder',
        ]);

        Role::create([
            'name' => 'user',
        ]);
    }
}
