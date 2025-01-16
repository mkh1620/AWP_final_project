<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MilestonesSeeder extends Seeder
{
    public function run()
    {
        DB::table('milestones')->insert([
            [
                'name' => 'Initial Research and Planning',
                'target_date' => Carbon::now()->addMonths(1),
                'status' => 'pending',
                'deliverable' => 'Comprehensive research plan',
                'research_grant_id' => 24, // Replace with the actual ID of the first project
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prototype Development',
                'target_date' => Carbon::now()->addMonths(3),
                'status' => 'pending',
                'deliverable' => 'Initial prototype',
                'research_grant_id' => 24, // Replace with the actual ID of the first project
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Final Report Submission',
                'target_date' => Carbon::now()->addMonths(6),
                'status' => 'pending',
                'deliverable' => 'Final research report',
                'research_grant_id' => 24, // Replace with the actual ID of the first project
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Collection and Analysis',
                'target_date' => Carbon::now()->addMonths(2),
                'status' => 'pending',
                'deliverable' => 'Analyzed data and results',
                'research_grant_id' => 25, // Replace with the actual ID of the second project
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Report Compilation',
                'target_date' => Carbon::now()->addMonths(4),
                'status' => 'pending',
                'deliverable' => 'Compiled research report',
                'research_grant_id' => 25, // Replace with the actual ID of the second project
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
