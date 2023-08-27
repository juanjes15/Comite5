<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('norma_infringida', function (Blueprint $table) {
            $table->id();
            $table->foreignId('numeral_id')->constrained()->cascadeOnDelete();
            $table->foreignId('solicitud_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('norma_infringida');
    }
};