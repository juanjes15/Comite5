<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->string('pru_tipo');
            $table->string('pru_descripcion');
            $table->dateTime('pru_fecha');
            $table->string('pru_lugar');
            $table->string('pru_url');
            $table->foreignId('solicitud_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};