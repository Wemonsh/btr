<?php

use Illuminate\Database\Seeder;
use App\ServiceCategoryContent;

class CategoryContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategoryContent::create(
            [
                'name' => 'Aion server 1',
                'category_id' => 1
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Aion server 2',
                'category_id' => 1
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Aion server 3',
                'category_id' => 1
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Лучник',
                'category_id' => 3
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Маг',
                'category_id' => 3
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Воин',
                'category_id' => 3
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Редкий',
                'category_id' => 4
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Очень редкий',
                'category_id' => 4
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Обычный',
                'category_id' => 4
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Орда',
                'category_id' => 2
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'Альянс',
                'category_id' => 2
            ]
        );

        ServiceCategoryContent::create(
            [
                'name' => 'НЛО',
                'category_id' => 2
            ]
        );
    }
}
