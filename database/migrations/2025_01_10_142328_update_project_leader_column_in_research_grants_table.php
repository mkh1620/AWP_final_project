<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('research_grants', function (Blueprint $table) {
        $table->string('project_leader_id')->change(); // Change the column type to string to store staff_number
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_grants', function (Blueprint $table) {
            //
        });
    }
};
