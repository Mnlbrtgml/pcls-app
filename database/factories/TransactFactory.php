<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transact>
 */
class TransactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [

            'processed_by' => fake()->randomElement(['Administrator', 'Staff']),
            'name' => fake()->name(),
            'clothe_types' => fake()->word(),
            'weight' => fake()->numberBetween(3, 10),
            'total' => fake()->numberBetween(3, 10) * fake()->numberBetween(30, 35),
            'status' => fake()->randomElement(['Pending', 'Claimed']),
        ];
    }
}
