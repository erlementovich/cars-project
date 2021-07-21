<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(1000000, 10000000);
        return [
            'name' => $this->faker->text(30),
            'body' => $this->faker->text(200),
            'price' => $price,
            'old_price' => intval($price * rand(11, 20) / 10),
            'salon' => $this->faker->text(50),
            'car_class_id' => CarClass::factory(),
            'kpp' => $this->faker->text(20),
            'year' => $this->faker->numberBetween(1990, 2021),
            'color' => $this->faker->safeHexColor(),
            'car_body_id' => CarBody::factory(),
            'car_engine_id' => CarEngine::factory(),
            'is_new' => $this->faker->boolean()
        ];
    }
}
