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
use Spatie\Permission\Contracts\Role;
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
            'name'=> 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => 'K-is-king',
            'remember_token' => '0000000000000000000',
        ]);

       User::factory()->create([
            'id' => 2,
            'name'=> 'Student Full Name',
            'email' => 'student@gmail.com',
            'avatar_url' => '',
            'email_verified_at' => now(),
            'password' => 'K-is-dev',
            'remember_token' => '0000000000000000000',
        ]);
        // for creating user
        // User::factory(3)->create();
    }
}