<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Clear existing users with specific emails (optional)
        User::where('email', 'admin@example.com')->delete();
        User::where('email', 'leader1@example.com')->delete();
        User::where('email', 'leader2@example.com')->delete();

        // Seed the users
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Unique constraint check
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'leader1@example.com'],
            [
                'name' => 'Project Leader 1',
                'password' => Hash::make('password'),
                'role' => 'project_leader',
                'staff_id' => 'PL001', // Match the staff_id in academicians
            ]
        );
        
        User::firstOrCreate(
            ['email' => 'leader2@example.com'],
            [
                'name' => 'Project Leader 2',
                'password' => Hash::make('password'),
                'role' => 'project_leader',
                'staff_id' => 'PL002', // Match the staff_id in academicians
            ]
        );
        
    }
}
