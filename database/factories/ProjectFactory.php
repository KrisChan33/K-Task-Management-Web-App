<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement(['Completed', 'In Progress', 'Not Started']),
        ];
    }
}