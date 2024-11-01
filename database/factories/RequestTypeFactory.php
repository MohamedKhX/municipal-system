<?php

namespace Database\Factories;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestType>
 */
class RequestTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(RequestStatus::values()),

            'municipality_id' => 1

        ];
    }
}
