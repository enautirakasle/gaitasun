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
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('valor')->nullable()->comment('Valor del indicador, puede ser un número, indicará si ese  indicador suma paraa conseguir esa competencia o resta, etc.');
            $table->foreignId('competencia_transversal_id')->constrained('competencia_transversals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadors');
    }
};
