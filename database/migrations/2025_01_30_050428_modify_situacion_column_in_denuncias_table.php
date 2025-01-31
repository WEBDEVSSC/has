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
            // Cambiar 'situacion' de string a text
            $table->text('situacion')->change();
            $table->text('como')->change();
            $table->text('cuando')->change();
            $table->text('donde')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncias', function (Blueprint $table) {
            // Si deseas revertir, vuelve a 'string' con longitud 255
            $table->string('situacion', 255)->change();
            $table->string('como', 255)->change();
            $table->string('cuando', 255)->change();
            $table->string('donde', 255)->change();
        });
    }
};
