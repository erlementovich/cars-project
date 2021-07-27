<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'description' => $this->faker->text(50),
            'link' => $this->faker->url(),
        ];
    }
}
