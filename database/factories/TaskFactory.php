<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'repeater_data' => [
                'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed']),
                'name' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
            ],
            // 'deadline' => $this->faker->date,
        ];
    }
}