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
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('original_employee_id');
            $table->unsignedBigInteger('destination_employee_id');
            $table->string('escalation_state_id');
            $table->unsignedBigInteger('original_assignment_id'); 
            $table->unsignedBigInteger('destination_assignment_id'); 
            $table->string('reason');
            $table->timestamps();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('original_employee_id')->references('id')->on('employees');
            $table->foreign('destination_employee_id')->references('id')->on('employees');
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
