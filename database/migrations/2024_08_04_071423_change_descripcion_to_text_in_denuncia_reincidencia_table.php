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
        Schema::table('denuncia_reincidencia', function (Blueprint $table) {
            // Cambiar el tipo de columna de 'descripcion' a 'text'
            $table->text('descripcion')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia_reincidencia', function (Blueprint $table) {
            // Revertir el cambio al tipo original de la columna, por ejemplo 'string' con tamaño 255
            $table->string('descripcion', 255)->change();
        });
    }
};
