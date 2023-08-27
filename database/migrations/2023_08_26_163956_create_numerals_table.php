<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('numerals', function (Blueprint $table) {
            $table->id();
            $table->string('num_descripcion', 7000);
            $table->string('num_categoria');
            $table->string('num_tipoFalta');
            $table->foreignId('articulo_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('numerals');
    }
};