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
        Schema::table('denuncia', function (Blueprint $table) {
            // Renombrar la columna 'entidad' a 'municipio'
            $table->renameColumn('entidad', 'municipio');
            
            // Renombrar la columna 'id_entidad' a 'id_municipio'
            $table->renameColumn('id_entidad', 'id_municipio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia', function (Blueprint $table) {
            // Revertir los nombres de las columnas en caso de rollback
            $table->renameColumn('municipio', 'entidad');
            $table->renameColumn('id_municipio', 'id_entidad');
        });
    }
};
