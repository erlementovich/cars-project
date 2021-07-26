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
        Category::factory(5)->create()->each(function ($category) {
            $category->children()->saveMany(Category::factory(rand(4, 10))->create())->each(function ($cat) {
                $cat->children()->saveMany(Category::factory(rand(0, 3))->create());
            });
        });
    }
}
