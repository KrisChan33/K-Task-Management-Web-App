<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name'=> 'super_admin',
            'email' => 'superadmin@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => '123',
            'remember_token' => '0000000000000000000',
        ]);

        User::factory()->create([
            'id' => 2,
            'name'=> 'Student Full Name',
            'email' => 'student@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => '123',
            'remember_token' => '0000000000000000000',
        ]);
        User::factory(10)->create();
        Project::factory(10)->create();
        Task::factory(10)->create();

          // Run the Artisan command with options and flags
    }
}