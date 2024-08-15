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
        Schema::table('municipios', function (Blueprint $table) {
            // Renombrar la columna 'municipio' a 'nombre'
            $table->renameColumn('municipio', 'nombre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipios', function (Blueprint $table) {
            // Volver a renombrar la columna 'nombre' a 'municipio' si se revierte la migración
            $table->renameColumn('nombre', 'municipio');
        });
    }
};
