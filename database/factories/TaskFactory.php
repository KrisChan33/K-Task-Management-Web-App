<?php

namespace Database\Factories;

use App\Models\Project;
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
            // 'project_id' => $this->faker->randomElement(Project::pluck('id')->toArray()),
            'project_id' => $this->faker->randomElement(Project::pluck('id')->toArray()),
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            // 'deadline' => $this->faker->date,
        ];
    }
}