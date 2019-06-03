<?php

use Illuminate\Database\Seeder;
use App\Game;

class gamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Aion',
            'alias' => 'aion',
            'image' => '/img/icons/Aion.png',
        ]);

        Game::create([
            'name' => 'Albion Online',
            'alias' => 'albion-online',
            'image' => '/img/icons/AlbionOnline.png',
        ]);

        Game::create([
            'name' => 'Archeage RU',
            'alias' => 'archeage',
            'image' => '/img/icons/Archeage.png',
        ]);

        Game::create([
            'name' => 'Black Desert RU',
            'alias' => 'black-desert',
            'image' => '/img/icons/BlackDesert.png',
        ]);

        Game::create([
            'name' => 'Blade & Soul RU',
            'alias' => 'blade-and-soul',
            'image' => '/img/icons/BladeAndSoul.png',
        ]);
    }
}
