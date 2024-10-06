<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PgaAccessLog>
 */
class PgaAccessLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'endpoint' => fake()->randomElement(['/api/files', '/api/upload']),
            'is_error' => fake()->numberBetween(0, 1),
            'error_message' => fake()->randomElement([
                null,
                fake()->text(),
            ]),
            'ip' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'referer' => fake()->url(),
        ];
    }
}
