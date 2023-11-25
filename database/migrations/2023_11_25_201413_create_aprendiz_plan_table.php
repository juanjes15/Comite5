<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aprendiz_plan', function (Blueprint $table) {
            $table->id();
            $table->string('ap_observacion')->nullable();
            $table->string('ap_url')->nullable();
            $table->foreignId('aprendiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aprendiz_plan');
    }
};
