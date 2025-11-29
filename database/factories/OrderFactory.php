<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $biasedIdx = fake()->biasedNumberBetween(1, 6, fn ($i) => 1 - sqrt($i));
        $status = $biasedIdx < 4 ? 'paid' : fake()->randomElement(['refunded', 'failed', 'pending']);

        return [
            'number' => fake()->randomNumber(5, strict: true),
            'email' => fake()->unique()->safeEmail(),
            'amount' => fake()->randomNumber(3, strict: false),
            'status' => $status,
            'ordered_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'store_id' => 1,
        ];
    }
}
