<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'income_title' => fake()->text(50),
            'incate_id' => fake()->numberBetween(1,5),
            'income_amount' => fake()->numberBetween(100, 100000),
            'income_date' => fake()->dateTimeThisMonth()->format('Y-m-d'),
        ];
    }
}
