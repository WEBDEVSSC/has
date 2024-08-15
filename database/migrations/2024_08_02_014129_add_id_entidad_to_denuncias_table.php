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
             // Agregar la nueva columna antes de 'entidad'
             $table->unsignedBigInteger('id_entidad')->nullable()->before('entidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia', function (Blueprint $table) {
             // Eliminar la columna en caso de revertir la migración
             $table->dropColumn('id_entidad');
        });
    }
};
