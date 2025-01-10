<?php

namespace Database\Factories;

use App\Enums\RequestStatus;
use App\Enums\RequestType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),

            'subject' => fake()->title(),
            'message' => fake()->paragraphs(asText: true),

            'status' => fake()->randomElement(RequestStatus::values()),

            'location_latitude' => 32.8960958,
            'location_longitude' => 13.2156857,

            'request_type_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9]),
            'user_id' => 1,
            'municipality_id' => 1
        ];
    }
}
