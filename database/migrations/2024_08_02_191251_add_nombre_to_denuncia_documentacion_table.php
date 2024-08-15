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
        Schema::table('denuncia_documentacion', function (Blueprint $table) {
            $table->string('nombre'); // Definir el tipo de dato y otras configuraciones según sea necesario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia_documentacion', function (Blueprint $table) {
            $table->dropColumn('nombre');
        });
    }
};
