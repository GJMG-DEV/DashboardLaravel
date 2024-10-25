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
        Schema::create('tramite_documentario', function (Blueprint $table) {
            $table->id();
            $table->date('fechaIngreso');
            $table->integer('numeroDocumento');
            $table->string('nombreRemitente');
            $table->integer('folios');
            $table->text('asunto');
            $table->foreignId('idTipoDocumento')
            ->constrained(table:'tipo_documento', indexName:'idTipoDocumento')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramite_documentario');
    }
};
