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
        Category::factory(2)->create()->each(function ($category) {
            $category->children()->saveMany(Category::factory(4)->create());
        });
        Category::factory(3)->create();
    }
}
