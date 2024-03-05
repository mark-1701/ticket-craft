<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('priority_id');
            $table->string('state_id');
            $table->string('type_id');
            $table->string('departament_id');
            $table->string('affair');
            $table->string('description');
            $table->string('solution');
            $table->timestamp('due_in');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
