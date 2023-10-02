<?php

namespace Database\Factories;

use App\Models\Writers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Writers>
 */
class WritersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'created_at' => $this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam'),
            'updated_at' => $this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam')
        ];
    }
}
