<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
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
        $articles = Article::factory(rand(10, 50))->create();
        $tags = Tag::query()->get();

        foreach ($articles as $article) {
            $randomTags = $tags->random(rand(2, 10));

            $randomTags->each(function ($tag) use ($article) {
                $article->tags()->save($tag);
            });
        }
    }
}
