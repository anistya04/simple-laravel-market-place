<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(10000, 100000),
            'stock' => $this->faker->randomNumber(2),
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),

        ];
    }
}
