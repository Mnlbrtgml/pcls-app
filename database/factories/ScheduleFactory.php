<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
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
            'address' => fake()->address(),
            'number' => "09" . fake()->numberBetween(100000000, 999999999),
            'pickup_date' => fake()->dateTimeBetween('2022-11-01', '2022-11-05', 'Asia/Manila')->setTime(
                fake()->numberBetween(9, 17),
                0,
                0
            ),
            'scheduled_date' => fake()->dateTimeBetween('2022-11-06', '2022-11-10', 'Asia/Manila')->setTime(
                fake()->numberBetween(9, 17),
                0,
                0
            ),
            'delivered_date' => fake()->dateTimeBetween('2022-11-11', '2022-11-15', 'Asia/Manila')->setTime(
                fake()->numberBetween(9, 17),
                0,
                0
            ),
            'total' => fake()->numberBetween(3, 10) * fake()->numberBetween(30, 35),
        ];
    }
}
