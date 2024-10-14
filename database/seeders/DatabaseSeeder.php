<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        
        User::factory()->create([
            'name'=> 'super_admin',
            'email' => 'superadmin@gmail.com',
            'avatar_url' => 'https://media.licdn.com/dms/image/v2/D5603AQHHexzFpcMDgg/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1728366826678?e=1734566400&v=beta&t=RkDy9BTZkbVtsohLNi9x7DZSluchvg93ktEKDxEXYIU',
            'email_verified_at' => now(),
            'password' => '123',
            'remember_token' => '0000000000000000000',
        ]);
        User::factory()->create([
            'name'=> 'Student Full Name',
            'email' => 'student@gmail.com',
            'avatar_url' => 'https://media.licdn.com/dms/image/v2/D5603AQHHexzFpcMDgg/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1728366826678?e=1734566400&v=beta&t=RkDy9BTZkbVtsohLNi9x7DZSluchvg93ktEKDxEXYIU',
            'email_verified_at' => now(),
            'password' => '123',
            'remember_token' => '0000000000000000000',
        ]);

      
          // Run the Artisan command with options and flags
    }
}