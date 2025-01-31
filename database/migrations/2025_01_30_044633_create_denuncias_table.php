<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            
            // Datos de la víctima
            $table->string('tipo_denuncia');
            $table->string('victima_nombre');
            $table->string('victima_sexo');
            $table->integer('victima_edad');
            $table->string('victima_email')->nullable();
            $table->string('victima_telefono', 10);
            $table->string('victima_tipo_contratacion');
            $table->string('victima_enformacion_escuela')->nullable();
            $table->string('victima_condiciones_vulnerabilidad');
            $table->string('victima_condiciones_vulnerabilidad_otro')->nullable();
            $table->string('victima_clues');
            $table->string('victima_area_adscripcion');
            $table->string('victima_puesto_desempena');
            $table->string('victima_jefe_inmediato');
            $table->string('victima_medidas_proteccion');

            // Datos de la CLUES
            $table->string('clues_nombre');
            $table->integer('clues_municipio');
            $table->string('clues_municipio_label');
            $table->integer('clues_jurisdiccion');
            $table->string('clues_jurisdiccion_label');

            // Datos del agresor
            $table->string('agresor_nombre');
            $table->string('agresor_sexo');
            $table->integer('agresor_edad');
            $table->string('agresor_area');
            $table->string('agresor_puesto');
            $table->string('agresor_tipo_contratacion');
            $table->string('agresor_jefe_inmediato');

            // Datos de la relación laboral
            $table->string('relacion_laboral');
            $table->string('relacion_laboral_si')->nullable();
            $table->string('relacion_laboral_no')->nullable();

            // Situación de la denuncia
            $table->string('situacion');
            $table->string('como');
            $table->string('cuando');
            $table->string('donde');

            // Archivos adjuntos
            $table->string('documento_uno')->nullable();
            $table->string('documento_dos')->nullable();

            // Conducta ocurrida
            $table->string('conducta_ocurrido');
            $table->date('conducta_ocurrido_fecha');

            // Testigos
            $table->string('persona_testigo');
            $table->string('persona_testigo_si')->nullable();

            // Relación de personas involucradas
            $table->string('persona_relacion');
            $table->string('persona_relacion_si')->nullable();

            // Tratamiento de la persona
            $table->string('persona_trato');
            $table->string('persona_trato_si')->nullable();

            // Padecimiento físico
            $table->string('padecimiento_fisico');
            $table->string('padecimiento_fisico_si')->nullable();

            // Integridad
            $table->string('integridad');
            $table->string('integridad_si')->nullable();

            // Amenazas
            $table->string('amenazada');
            $table->string('amenazada_si')->nullable();

            // Información adicional
            $table->string('adicionales');
            $table->string('adicionales_si')->nullable();

            // Denuncia
            $table->string('denuncia');
            $table->string('denuncia_si')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
};
