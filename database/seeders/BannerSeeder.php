<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Database\Seeder;
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
        $imageUploader = app()->make(ImageUploader::class);
        $imagePaths = $imageUploader->seedImages(['banners']);
        $images = $imageUploader->factoryImages($imagePaths)->toArray();
        Banner::factory(3)->create()->each(function ($banner, $key) use ($images) {
            $banner->update(['image_id' => $images[$key]['id']]);
        });
    }
}
