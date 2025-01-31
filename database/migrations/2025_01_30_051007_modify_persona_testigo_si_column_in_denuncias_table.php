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
        Schema::table('denuncias', function (Blueprint $table) {
            // Cambiar 'persona_testigo_si' de string a text
            $table->text('persona_testigo_si')->nullable()->change();
            $table->text('persona_relacion_si')->nullable()->change();
            $table->text('persona_trato_si')->nullable()->change();
            $table->text('padecimiento_fisico_si')->nullable()->change();
            $table->text('integridad_si')->nullable()->change();
            $table->text('amenazada_si')->nullable()->change();
            $table->text('adicionales_si')->nullable()->change();
            $table->text('denuncia_si')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncias', function (Blueprint $table) {
            // Si deseas revertir, vuelve a 'string' con longitud 255
            $table->string('persona_testigo_si', 255)->nullable()->change();
            $table->string('persona_relacion_si', 255)->nullable()->change();
            $table->string('persona_trato_si', 255)->nullable()->change();
            $table->string('padecimiento_fisico_si', 255)->nullable()->change();
            $table->string('integridad_si', 255)->nullable()->change();
            $table->string('amenazada_si', 255)->nullable()->change();
            $table->string('adicionales_si', 255)->nullable()->change();
            $table->string('denuncia_si', 255)->nullable()->change();
        });
    }
};
