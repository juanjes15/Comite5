<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aprendiz_solicitud', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aprendiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('solicitud_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitud_aprendiz');
    }
};