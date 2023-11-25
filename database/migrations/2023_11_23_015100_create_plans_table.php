<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->date('pla_fechaInicio')->nullable();
            $table->date('pla_fechaFin')->nullable();
            $table->string('pla_descripcion')->nullable();
            $table->string('pla_url')->nullable();
            $table->string('pla_estado');
            $table->foreignId('comite_id')->constrained()->cascadeOnDelete();
            $table->foreignId('instructor_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
