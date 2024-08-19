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
            $table->text('nombre')->change();
            $table->text('celular')->change();
            $table->text('correo')->change();
            $table->text('denunciado_nombre')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncia', function (Blueprint $table) {
            $table->string('nombre', 255)->change();
            $table->string('celular', 255)->change();
            $table->string('correo', 255)->change();
            $table->string('cordenunciado_nombrereo', 255)->change();
        });
    }
};
