<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            $table->string('fic_codigo')->unique();
            $table->date('fic_inicioLectiva');
            $table->date('fic_finLectiva');
            $table->date('fic_inicioProductiva');
            $table->date('fic_finProductiva');
            $table->string('fic_modalidad');
            $table->string('fic_jornada');
            $table->foreignId('programa_id')->constrained();
            $table->foreignId('instructor_id')->constrained();
            $table->foreignId('aprendiz_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};