<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_tramite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tramite_documentario_id')->constrained('tramite_documentario')->onDelete('cascade');
            $table->foreignId('unidad_id')->constrained('unidad')->onDelete('cascade');
            $table->timestamp('fecha_derivacion')->useCurrent(); // Fecha de derivación

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_tramite');
    }
};
