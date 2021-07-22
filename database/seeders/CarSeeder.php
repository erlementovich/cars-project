<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = rand(20, 100);
        $bodies = CarBody::query()->get();
        $classes = CarClass::query()->get();
        $engines = CarEngine::query()->get();

        $isNewCounter = 0;
        $newCount = rand(0, 4);

        for ($i = 0; $i < $rand; ++$i) {
            $is_new = rand(0, 1) == 1;

            Car::factory()->create([
                'car_class_id' => $classes->random()->id,
                'car_body_id' => $bodies->random()->id,
                'car_engine_id' => $engines->random()->id,
                'is_new' => $is_new && $isNewCounter++ < $newCount
            ]);

        }
    }
}