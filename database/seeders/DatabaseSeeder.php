<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticleSeeder::class);
        $this->call(CarBodySeeder::class);
        $this->call(CarClassSeeder::class);
        $this->call(CarEngineSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CarSeeder::class);
        $this->call(BannerSeeder::class);
    }
}
