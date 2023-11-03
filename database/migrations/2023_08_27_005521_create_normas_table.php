<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('normas', function (Blueprint $table) {
            $table->foreignId('solicitud_id')->constrained()->cascadeOnDelete();
            $table->morphs('norma');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('norma_infringida');
    }
};