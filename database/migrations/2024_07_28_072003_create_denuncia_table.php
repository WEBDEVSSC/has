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
        Schema::create('denuncia', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('correo');
            $table->string('celular');
            $table->string('adscripcion');
            $table->string('unidad_resposable');
            $table->string('entidad');
            $table->string('tipo_contratacion');
            $table->string('cargo');
            $table->string('vulnerabilidad');
            $table->string('cual');
            $table->string('tipo_solicitud');
            $table->text('como');
            $table->text('cuando');
            $table->text('donde');
            $table->text('imagenuno');
            $table->text('imagendos');
            $table->text('denunciado_nombre');
            $table->text('denunciado_cargo');
            $table->text('denunciado_puesto');
            $table->text('denunciado_antecedentes');
            $table->text('testigos');
            $table->integer('folio');
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia');
    }
};
