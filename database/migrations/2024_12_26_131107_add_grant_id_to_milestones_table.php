<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGrantIdToMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('milestones', function (Blueprint $table) {
            $table->unsignedBigInteger('grant_id')->after('id'); // Add grant_id column
            $table->foreign('grant_id')->references('id')->on('research_grants')->onDelete('cascade'); // Set foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('milestones', function (Blueprint $table) {
            $table->dropForeign(['grant_id']);
            $table->dropColumn('grant_id');
        });
    }
}
