<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use League\CommonMark\Inline\Element\Strong;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUploader = App::make(ImageUploader::class);
        $imagePaths = $imageUploader->seedImages('banners');
        $images = $imageUploader->factoryImages($imagePaths);

        $images->each(function ($image) {
            Banner::factory()->create(['image_id' => $image->id]);
        });
    }
}
