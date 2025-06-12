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
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indicador_id')
                ->constrained('indicadores')
                ->onDelete('cascade');
            $table->foreignId('alumno_id')
                ->constrained('alumnos')
                ->onDelete('cascade');
            $table->foreignId('profesor_id')
                ->constrained('profesores')
                ->onDelete('cascade');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->foreignId('grupo_id')
                ->constrained('grupos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};
