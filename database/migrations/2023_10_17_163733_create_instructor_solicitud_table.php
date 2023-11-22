<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('instructor_solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('is_descargo', 7000)->nullable();
            $table->foreignId('instructor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('solicitud_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instructor_solicitud');
    }
};