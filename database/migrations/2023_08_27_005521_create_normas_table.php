<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('normas', function (Blueprint $table) {
            $table->id();
            $table->string('norma_type');
            $table->foreignId('norma_id')->constrained()->cascadeOnDelete();
            $table->foreignId('solicitud_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('norma_infringida');
    }
};