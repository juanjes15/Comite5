<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comites', function (Blueprint $table) {
            $table->id();
            $table->string('com_estado');
            $table->dateTime('com_fecha');
            $table->string('com_lugar');
            $table->string('com_recomendacion');
            $table->string('com_acta');
            $table->foreignId('solicitud_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comites');
    }
};