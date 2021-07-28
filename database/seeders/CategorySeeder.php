<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Легковые',
                'children' => [
                    ['name' => 'Хэтчбеки',],
                    ['name' => 'Универсалы'],
                    ['name' => 'Купе'],
                    ['name' => 'Родстеры']
                ]
            ],
            [
                'name' => 'Внедорожники',
                'children' => [
                    ['name' => 'Рамные'],
                    ['name' => 'Пикапы'],
                    ['name' => 'Кроссоверы'],
                ]
            ],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки']
        ];

        foreach ($categories as $category) {
            if (!isset($category['name']))
                continue;

            $createdCat = Category::factory()->create(['name' => $category['name']]);

            if (!isset($category['children']))
                continue;

            $childrenArr = $category['children'];
            $childCategories = collect();

            foreach ($childrenArr as $child) {
                $childCategories->push(Category::factory()->create($child));
            }

            $createdCat->children()->saveMany($childCategories);
        }
    }
}
