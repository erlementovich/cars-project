<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $count = rand(10, 50);
        $articles = Article::factory($count)->create();
        $faker = Factory::create();

        $halfRandomArticles = $articles->random(intdiv($count, 2));

        $halfRandomArticles->each(function ($article) use ($faker) {
            $article->update([
                'published_at' => $faker->dateTimeThisMonth()
            ]);
        });
    }
}
