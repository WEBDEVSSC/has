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
        //
        Schema::table('denuncia', function (Blueprint $table) {

            // Añadir más campos y modificaciones aquí si es necesario
            $table->string('nombre')->nullable()->change();;
            $table->integer('edad')->nullable()->change();;
            $table->string('sexo')->nullable()->change();;
            $table->string('correo')->nullable()->change();;
            $table->string('celular')->nullable()->change();;
            $table->string('adscripcion')->nullable()->change();;
            $table->string('unidad_resposable')->nullable()->change();;
            $table->string('entidad')->nullable()->change();;
            $table->string('tipo_contratacion')->nullable()->change();;
            $table->string('cargo')->nullable()->change();;
            $table->string('vulnerabilidad')->nullable()->change();;
            $table->string('cual')->nullable()->change();;
            $table->string('tipo_solicitud')->nullable()->change();;
            $table->text('como')->nullable()->change();;
            $table->text('cuando')->nullable()->change();;
            $table->text('donde')->nullable()->change();;
            $table->text('imagenuno')->nullable()->change();;
            $table->text('imagendos')->nullable()->change();;
            $table->text('denunciado_nombre')->nullable()->change();;
            $table->text('denunciado_cargo')->nullable()->change();;
            $table->text('denunciado_puesto')->nullable()->change();;
            $table->text('denunciado_antecedentes')->nullable()->change();;
            $table->text('testigos')->nullable()->change();;
            $table->integer('folio')->nullable()->change();;
            $table->string('status')->nullable()->change();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
