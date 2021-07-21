<?php

namespace Database\Seeders;

use App\Models\CarBody;
use Illuminate\Database\Seeder;

class CarBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'Седан', 'Универсал', 'Хэтчбек',
            'Минивен', 'Внедорожник (кроссовер)',
            'Купе', 'Кабриолет', 'Пикап'
        ];
        $rand = rand(4, count($attributes));

        for ($i = 0; $i < $rand; ++$i) {
            CarBody::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
