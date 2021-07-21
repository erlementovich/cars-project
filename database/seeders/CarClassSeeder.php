<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'Бизнес-класс', 'Представительский класс', 'Спортивные купе',
            'Купе класса GT', 'Комфорт класс', 'Средний класс'
        ];

        $rand = rand(4, count($attributes));

        for ($i = 0; $i < $rand; ++$i) {
            CarClass::factory()->create(['name' => $attributes[$i]]);
        }
    }
}
