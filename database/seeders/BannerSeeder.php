<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Image;
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
        $images = Image::query()->get();

        Banner::factory(5)->create()->each(function ($banner) use ($images) {
            $banner->update(['image_id' => $images->random()->id]);
        });
    }
}
