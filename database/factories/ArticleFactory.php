<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(125),
            'body' => $this->faker->text(1000),
            'published_at' => $this->faker->optional(0.5)->dateTimeThisMonth(),
        ];
    }
}
