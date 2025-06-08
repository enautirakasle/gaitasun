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
        Schema::create('alumno_grupo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->foreignId('grupo_id')->constrained('grupos');
            $table->boolean('activo')->default(true); // Indica si el alumno está activo en el grupo, por defecto true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_grupo');
    }
};
