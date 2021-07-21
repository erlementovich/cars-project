<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            '2.0 MPI / 150 л.с. / Бензин', '1.6 MPI / 128 л.c. / Бензин',
            '1.6 MPI / 128 л.c. / Бензин', '1.4 MPI / 118 л.c. / Бензин',
            '1.4 MPI / 108 л.c. / Бензин', '2.4 MPI / 188 л.c. / Бензин'
        ];

        $rand = rand(4, count($attributes));
        for ($i = 0; $i < $rand; ++$i) {
            CarEngine::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
