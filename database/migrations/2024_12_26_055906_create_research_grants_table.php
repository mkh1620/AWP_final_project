<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('research_grants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('project_leader_id'); // Foreign key to academicians
            $table->decimal('amount', 10, 2);
            $table->string('provider');
            $table->date('start_date');
            $table->integer('duration_months');
            $table->timestamps();
        
            $table->foreign('project_leader_id')->references('id')->on('academicians')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_grants');
    }
};
