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
        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academician_id'); // Foreign key to academicians
            $table->unsignedBigInteger('research_grant_id'); // Foreign key to research grants
            $table->timestamps();
        
            $table->foreign('academician_id')->references('id')->on('academicians')->onDelete('cascade');
            $table->foreign('research_grant_id')->references('id')->on('research_grants')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }
};
