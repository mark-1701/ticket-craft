<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('departament_id')->nullable();
            $table->string('name', 255);
            $table->timestamps();
            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
