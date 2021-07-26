<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
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
        $images = Image::query()->get();

        foreach ($articles as $article) {
            $article->update(['image_id' => $images->random()->id]);
            $randomTags = $tags->random(rand(2, 6));

            $randomTags->each(function ($tag) use ($article) {
                $article->tags()->save($tag);
            });
        }
    }
}
