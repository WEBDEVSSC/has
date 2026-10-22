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
        Schema::table('clues', function (Blueprint $table) {
            $table->foreignId('municipio_id')
                  ->after('municipio')
                  ->constrained('municipios')
                  ->onDelete('cascade'); // Opcional: define qué pasa si se borra el municipio
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clues', function (Blueprint $table) {
            // Es importante eliminar primero la llave foránea y luego la columna
            $table->dropForeign(['municipio_id']);
            $table->dropColumn('municipio_id');
        });
    }
};
