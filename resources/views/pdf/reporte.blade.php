<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Denuncia</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 20mm 15mm;
        }

        body {
            font-family: "Helvetica", Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h1, h2, h3 {
            margin: 0;
            padding: 0;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .header table {
            width: 100%;
        }

        .header-left {
            font-weight: bold;
            font-size: 14px;
        }

        .header-right {
            text-align: right;
            font-size: 13px;
        }

        .section {
            margin-bottom: 18px;
        }

        .section-title {
            background-color: #FFFFFF;   /* azul institucional */
            color: #000000;
            font-weight: bold;
            padding: 6px 10px;
            border-left: 6px solid #AD46FF;
            margin: 15px 0 6px;
            text-transform: uppercase;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.data-table td {
            border: 1px solid #000;
            padding: 6px 8px;
            vertical-align: top;
        }

        table.data-table td.label {
            font-weight: bold;
            width: 25%;
            background-color: #f8f9f9;
        }

        .text-block {
            border: 1px solid #000;
            padding: 8px;
            min-height: 50px;
        }

        .footer {
            position: fixed;
            bottom: 10mm;
            left: 15mm;
            right: 15mm;
            font-size: 10px;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO -->
    <div class="header">
        <table>
            <tr>
                <td class="header-left">
                    Servicios de Salud de Coahuila de Zaragoza
                </td>
                <td class="header-right">
                    Hostigamiento y Acoso Sexual
                </td>
            </tr>
        </table>
    </div>

    <!-- DATOS GENERALES -->
    <div class="section">
        <div class="section-title">DATOS DE LA DENUNCIA</div>

        <table class="data-table">
            <tr>
                <td class="label" style="width:10%;">Folio</td>
                <td style="width:23%;">
                    SSC/HAS/{{ $denuncia->created_at->year }}/{{ $denuncia->folio }}
                </td>

                <td class="label" style="width:10%;">Estatus</td>
                <td style="width:17%;">
                    {{ $denuncia->status }}
                </td>

                <td class="label" style="width:15%;">Tipo</td>
                <td style="width:25%;">
                    {{ $denuncia->tipo_denuncia }}
                </td>
            </tr>
        </table>
    </div>

    <!-- DATOS DE LA VICTIMA -->
    <div class="section">
        <div class="section-title">DATOS DE LA PRESUNTA VICTIMA</div>

        <table class="data-table">
            <tr>
                <td class="label" style="width:12%;">Nombre</td>
                <td style="width:50%;">
                    {{ $denuncia->victima_nombre }}
                </td>

                <td class="label" style="width:10%;">Sexo</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_sexo }}
                </td>

                <td class="label" style="width:10%;">Edad</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_edad }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>
                <td class="label" style="width:12%;">Télefono</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_telefono }}
                </td>

                <td class="label" style="width:10%;">E-mail</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_email }}
                </td>

            </tr>
        </table>

        <table class="data-table">
            <tr>
                <td class="label" style="width:20%;">Contrato</td>
                <td style="width:20%;">
                    {{ $denuncia->victima_tipo_contratacion }}
                </td>
        
                <td class="label" style="width:15%;">Institución*</td>
                <td style="width:45%;">
                    {{ $denuncia->victima_enformacion_escuela }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>
                <td class="label" style="width:20%;">Vulnerabilidad</td>
                <td style="width:20%;">
                    {{ $denuncia->victima_condiciones_vulnerabilidad }}
                </td>
        
                <td class="label" style="width:15%;">Especifique*</td>
                <td style="width:45%;">
                    {{ $denuncia->victima_condiciones_vulnerabilidad_otro }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>
                <td class="label" style="width:20%;">Adscripción</td>
                <td style="width:80%;">
                    J. {{ $denuncia->clues_jurisdiccion }} - {{ $denuncia->clues_nombre }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>
                <td class="label" style="width:15%;">Área</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_area_adscripcion }}
                </td>
        
                <td class="label" style="width:15%;">Puesto</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_puesto_desempena }}
                </td>

                <td class="label" style="width:15%;">Jefe</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_jefe_inmediato }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>        
                <td class="label" style="width:25%;">Medidas de Protección</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_medidas_proteccion }}
                </td>

                <td class="label" style="width:25%;">¿Se solicitarón?</td>
                <td style="width:25%;">
                    {{ $denuncia->victima_medidas_proteccion_solicita }}
                </td>
            </tr>
        </table>

    </div>



    <!-- DENUNCIADO -->
    <div class="section">
        <div class="section-title">DATOS DE LA PERSONA PRESUNTA AGRESORA</div>
        <table class="data-table">
            <tr>        
                <td class="label" style="width:10%;">Nombre</td>
                <td style="width:20%;">
                    {{ $denuncia->agresor_nombre }}
                </td>

                <td class="label" style="width:10%;">Sexo</td>
                <td style="width:5%;">
                    {{ $denuncia->agresor_sexo }}
                </td>

                <td class="label" style="width:10%;">Edad</td>
                <td style="width:5%;">
                    {{ $denuncia->agresor_edad }}
                </td>

                <td class="label" style="width:10%;">Área</td>
                <td style="width:20%;">
                    {{ $denuncia->agresor_area }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>        
                <td class="label" style="width:5%;">Puesto</td>
                <td style="width:15%;">
                    {{ $denuncia->agresor_puesto }}
                </td>

                <td class="label" style="width:10%;">Contratación</td>
                <td style="width:10%;">
                    {{ $denuncia->agresor_tipo_contratacion }}
                </td>

                <td class="label" style="width:5%;">Jefe</td>
                <td style="width:10%;">
                    {{ $denuncia->agresor_jefe_inmediato }}
                </td>

            </tr>
        </table>

    </div>

    <!-- RELACION CON EL AGRESOR -->
    <div class="section">
        <div class="section-title">¿EXISTE ALGUNA RELACIÓN LABORAL?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->relacion_laboral }} -  {{ $denuncia->relacion_laboral_si }} {{ $denuncia->relacion_laboral_no }}
                </td>
            </tr>
        </table>
    </div>

    <!-- SITUACION -->
    <div class="section">
        <div class="section-title">NARRACIÓN DE LOS HECHOS</div>
        <table class="data-table">
            <tr>        
                <td class="label" style="width:15%;">Situación</td>
                <td style="width:85%;">
                    {{ $denuncia->situacion }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>        
                <td class="label" style="width:15%;">Como</td>
                <td style="width:85%;">
                    {{ $denuncia->como }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>        
                <td class="label" style="width:15%;">Cuando</td>
                <td style="width:85%;">
                    {{ $denuncia->cuando }}
                </td>
            </tr>
        </table>

        <table class="data-table">
            <tr>        
                <td class="label" style="width:15%;">Donde</td>
                <td style="width:85%;">
                    {{ $denuncia->donde }}
                </td>
            </tr>
        </table>

    </div>


    <!-- CONDUCATA OCURRIDO -->
    <div class="section">
        <div class="section-title">¿LA CONDUCTA HA OCURRIDO?</div>
        <table class="data-table">
            <tr>        
                <td style="width:50%;">
                    {{ $denuncia->conducta_ocurrido }}
                </td>

                <td class="label" style="width:25%;">Fecha aproximada</td>
                <td style="width:25%;">
                    {{ $denuncia->conducta_ocurrido_fecha }}
                </td>
            </tr>
        </table>
    </div>

     <!-- TESTIGOS -->
    <div class="section">
        <div class="section-title">¿ALGUNA PERSONA O PERSONAS PRESENCIARÓN LOS HECHOS?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->persona_testigo }} -  {{ $denuncia->persona_testigo_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- RELACION TESTIGOS -->
    <div class="section">
        <div class="section-title">¿LAS PERSONAS QUE PRESENCIARÓN LOS HECHOS GUARDAN UNA RELACIÓN CON EL PRESUNTO AGRESOR?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->persona_relacion }} -  {{ $denuncia->persona_relacion_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- TRATO DIFERENTE -->
    <div class="section">
        <div class="section-title">¿HA CAMBIADO LA RELACIÓN LABORAL?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->persona_trato }} -  {{ $denuncia->persona_trato_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- PADECIMIENTO FISICO -->
    <div class="section">
        <div class="section-title">¿HA USTED PRESENTADO UN PADECIMIENTO FÍSICO?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->padecimiento_fisico }} -  {{ $denuncia->padecimiento_fisico_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- INTEGRIDAD -->
    <div class="section">
        <div class="section-title">¿CONSIDERA QUE SU INTEGRIDAD FÍSICA O EMOCIONAL SE ENCUENTRA EN RIESGO?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->integridad }} -  {{ $denuncia->integridad_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- AMENAZADA -->
    <div class="section">
        <div class="section-title">¿HA SIDO AMENAZADA(O) POR NEGARSE A LA PROPUESTA O DETENER LA SITUACIÓN?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->amenazada }} -  {{ $denuncia->amenazada_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- DATOS ADICIONALES -->
    <div class="section">
        <div class="section-title">¿HAY DATOS ADICIONALES QUE PUEDE PROPORCIONAR?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->adicionales }} -  {{ $denuncia->adicionales_si }}
                </td>
            </tr>
        </table>
    </div>

    <!-- PRESENTADO DENUNCIA -->
    <div class="section">
        <div class="section-title">¿HA PRESENTADO ALGUNA DENUNCIA FORMAL?</div>
        <table class="data-table">
            <tr>        
                <td style="width:100%;">
                    {{ $denuncia->denuncia }} -  {{ $denuncia->denuncia_si }}
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
