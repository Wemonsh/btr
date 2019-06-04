<?php

use Illuminate\Database\Seeder;
use App\ServiceCategory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::create(
            [
                'name' => 'server',
                'placeholder' => 'Сервер'
            ]
        );
        ServiceCategory::create(
            [
                'name' => 'side',
                'placeholder' => 'Сторона'
            ]
        );
        ServiceCategory::create(
            [
                'name' => 'class',
                'placeholder' => 'Клас'
            ]
        );
        ServiceCategory::create(
            [
                'name' => 'type',
                'placeholder' => 'Тип'
            ]
        );
    }
}
