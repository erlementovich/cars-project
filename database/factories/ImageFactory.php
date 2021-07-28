<?php

namespace Database\Factories;

use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageUploader = App::make(ImageUploader::class);
        $url = $this->faker->imageUrl(800, 600);
        $path = $imageUploader->saveFromURL($url);

        return [
            'path' => $path,
            'alt' => $this->faker->text(200),
        ];
    }
}
