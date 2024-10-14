<?php

namespace Database\Factories;

use App\Enums\ReportStatus;
use App\Enums\ReportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraphs(asText: true),
            'location_latitude' => fake()->latitude(),
            'location_longitude' => fake()->longitude(),
            'street' => fake()->streetAddress(),
            'type' => fake()->randomElement(ReportType::values()),
            'status' => fake()->randomElement(ReportStatus::values()),

            'user_id' => 1,
            'municipality_id' => 1
        ];
    }
}
