<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToResearchGrantsTable extends Migration
{
    public function up()
    {
        Schema::table('research_grants', function (Blueprint $table) {
            $table->string('status')->default('ongoing')->after('duration_months'); // Default to 'ongoing'
        });
    }

    public function down()
    {
        Schema::table('research_grants', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
