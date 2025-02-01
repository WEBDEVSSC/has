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
        // Modificar la columna 'archivo' para permitir valores nulos
        Schema::table('denuncia_reincidencia', function (Blueprint $table) {
            $table->string('archivo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir el cambio: hacer que la columna 'archivo' no permita valores nulos
        Schema::table('denuncia_reincidencia', function (Blueprint $table) {
            $table->string('archivo')->nullable(false)->change();
        });
    }
};
