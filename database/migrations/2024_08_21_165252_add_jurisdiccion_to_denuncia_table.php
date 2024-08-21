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
            $table->integer('jurisdiccion')->nullable()->after('id_municipio'); // Cambia 'columna_existente' por la columna después de la cual quieres agregar 'jurisdiccion'
        });
    }

    public function down(): void
    {
        Schema::table('denuncia', function (Blueprint $table) {
            $table->dropColumn('jurisdiccion');
        });
    }
};
