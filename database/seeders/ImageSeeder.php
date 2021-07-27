<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUploader = app()->make(ImageUploader::class);
        $imagePaths = $imageUploader->seedImages(['cars']);
        $imageUploader->factoryImages($imagePaths);
    }
}
