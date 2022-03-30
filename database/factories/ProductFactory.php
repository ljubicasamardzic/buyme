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
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(5),
            'price' => rand(1500, 20000),
            'quantity' => rand(1, 100),
            'path' => '/clothes.jpg'
        ];
    }
}
