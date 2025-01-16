<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicianSeeder extends Seeder
{
    public function run()
    {
        DB::table('academicians')->insertOrIgnore([
            [
                'name' => 'Project Leader 1',
                'staff_number' => 'PL001', // This matches users.staff_id
                'email' => 'leader1@example.com',
                'college' => 'Engineering',
                'department' => 'Computer Science',
                'position' => 'Project Leader',
            ],
            [
                'name' => 'Project Leader 2',
                'staff_number' => 'PL002', // This matches users.staff_id
                'email' => 'leader2@example.com',
                'college' => 'Science',
                'department' => 'Physics',
                'position' => 'Project Leader',
            ],
        ]);
    }
}
