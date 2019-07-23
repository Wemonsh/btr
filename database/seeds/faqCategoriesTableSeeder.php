<?php

use Illuminate\Database\Seeder;
use App\FaqCategory;

class faqCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqCategory::create([
            'name' => 'Часто задаваемые вопросы',
        ]);

        FaqCategory::create([
            'name' => 'Разрешение споров',
        ]);

        FaqCategory::create([
            'name' => 'Правила для продавцов',
        ]);

        FaqCategory::create([
            'name' => 'Правила для покупателей',
        ]);
    }
}
