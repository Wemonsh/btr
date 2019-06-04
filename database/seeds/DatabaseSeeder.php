<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(gamesTableSeeder::class);
        $this->call(serviceTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CategoryContentTableSeeder::class);
    }
}
