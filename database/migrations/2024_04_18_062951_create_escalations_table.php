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
        Schema::create('escalations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('original_user_id')->nullable();
            $table->unsignedBigInteger('destination_user_id')->nullable();
            $table->string('escalation_state_id')->nullable()->default('1_NEW');
            $table->unsignedBigInteger('original_assignment_id')->nullable(); 
            $table->unsignedBigInteger('destination_assignment_id')->nullable(); 
            $table->string('reason')->nullable();
            $table->timestamps();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('original_user_id')->references('id')->on('users');
            $table->foreign('destination_user_id')->references('id')->on('users');
            $table->foreign('escalation_state_id')->references('id')->on('escalation_states');
            $table->foreign('original_assignment_id')->references('id')->on('assignments');
            $table->foreign('destination_assignment_id')->references('id')->on('assignments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escalations');
    }
};
