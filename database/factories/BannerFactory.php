<?php

namespace Database\Factories;

use App\Models\Banner;
use App\Models\Image;
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
            'title' => $this->faker->realText(40),
            'description' => $this->faker->realTextBetween(100, 150),
            'link' => $this->faker->url(),
            'image_id' => Image::factory(),
        ];
    }
}
