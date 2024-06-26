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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('priority_id');
            $table->string('ticket_state_id')->default('1_NEW');
            $table->string('type_id');
            $table->string('department_id');
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->text('resolution')->nullable();
            $table->string('image_uri')->nullable();
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('ticket_state_id')->references('id')->on('ticket_states');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
