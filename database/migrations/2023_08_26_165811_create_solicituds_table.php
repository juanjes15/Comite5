<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('sol_lugar');
            $table->string('sol_motivo');
            $table->string('sol_descripcion');
            $table->string('sol_estado');
            $table->foreignId('instructor_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};