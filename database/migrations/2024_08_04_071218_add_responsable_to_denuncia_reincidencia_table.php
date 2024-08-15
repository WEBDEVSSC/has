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
            // Agregar la columna responsable
            $table->unsignedBigInteger('responsable')->nullable()->after('descripcion');

            // Si deseas agregar una clave foránea para la columna responsable
            // $table->foreign('responsable')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia_reincidencia', function (Blueprint $table) {
            // Eliminar la columna responsable
            $table->dropColumn('responsable');
        });
    }
};
