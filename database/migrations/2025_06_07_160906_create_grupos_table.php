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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->onDelete('cascade'); // Assuming 'cursos' table exists
            $table->enum('turno', ['mañana', 'tarde'])->default('mañana')->nullable(); // Only 'mañana' or 'tarde', default 'mañana', nullable
            $table->string('aula')->nullable(); // Optional field for classroom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
