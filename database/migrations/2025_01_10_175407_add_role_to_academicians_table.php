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
        Schema::table('academicians', function (Blueprint $table) {
            $table->enum('role', ['project_leader', 'project_member'])->default('project_member');
        });
    }
    
    public function down()
    {
        Schema::table('academicians', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
    
};
