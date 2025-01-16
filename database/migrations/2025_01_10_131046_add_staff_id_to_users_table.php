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
        Schema::table('users', function (Blueprint $table) {
            $table->string('staff_id')->nullable()->after('role'); // Add staff_id column
            $table->foreign('staff_id')->references('staff_number')->on('academicians')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['staff_id']);
            $table->dropColumn('staff_id');
        });
    }
    
};
