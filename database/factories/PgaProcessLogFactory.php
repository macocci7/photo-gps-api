<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PgaProcessLog>
 */
class PgaProcessLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pga_access_log_id' => fake()->numberBetween(1, 10),
            'filename' => fake()->randomElement([
                fake()->url() . 'hoge.jpg',
                fake()->word() . '.jpg',
            ]),
            'exif_version' => fake()->randomElement([
                '0210', '0220', '0221', '0230', '0231', '0232', '0300',
            ]),
            'gps_data' => fake()->text(100),
        ];
    }
}
