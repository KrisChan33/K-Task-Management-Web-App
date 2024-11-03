<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use BezhanSalleh\FilamentShield\Resources\RoleResource;
use BezhanSalleh\FilamentShield\Resources\RoleResource\Pages\CreateRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Commands\CreateRole as CommandsCreateRole;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
 public function run(): void
    {
        // Create users
        User::factory()->create([
            'id' => 1,
            'name'=> 'super_admin',
            'email' => 'superadmin@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Use Hash::make to hash the password
            'remember_token' => '0000000000000000000',
        ]);
        User::factory()->create([
            'id' => 2,
            'name'=> 'Student Full Name',
            'email' => 'student@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Use Hash::make to hash the password
            'remember_token' => '0000000000000000000',
        ]);
        User::factory(10)->create();
        Project::factory(10)->create();
        Task::factory(10)->create();

    }
}