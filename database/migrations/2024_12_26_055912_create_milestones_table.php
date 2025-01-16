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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('research_grant_id'); // Foreign key to research grants
            $table->string('name');
            $table->date('target_date');
            $table->string('status')->default('Pending');
            $table->string('deliverable');
            $table->timestamps();
        
            $table->foreign('research_grant_id')->references('id')->on('research_grants')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
