<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResearchGrantSeeder extends Seeder
{
    public function run()
    {
        DB::table('research_grants')->insert([
            [
                'title' => 'AI-Powered Renewable Energy Optimization',
                'project_leader_id' => 'PL001', // Use staff_number here
                'amount' => 50000,
                'provider' => 'National Research Foundation',
                'start_date' => '2024-11-10',
                'duration_months' => 12,
                'status' => 'ongoing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blockchain-Based Secure Voting Systems',
                'project_leader_id' => 'PL002', // Use staff_number here
                'amount' => 75000,
                'provider' => 'Tech Innovation Grant',
                'start_date' => '2024-12-10',
                'duration_months' => 18,
                'status' => 'ongoing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
