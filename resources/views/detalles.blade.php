@extends('adminlte::page')

@section('title', 'Detalles')

@section('plugins.Sweetalert2', true)

@section('content_header')
<h1>Hostigamiento y Acoso Sexual</h1>
@stop

@section('content')

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif

    @if(session('reincidencia'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('reincidencia') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif

    @if(session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('status') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif

    <!-- ---------------------------------------------------------------------------------------------------- -->

    <div class="row">

        <div class="col-md-6">

        <div class="card card-purple">

    <div class="card-header">
        <h3 class="card-title">Expediente completo de la denuncia :  SSC/HAS/2025/{{ $denuncia->folio}}</h3>
    </div>

   

    <div class="card-body">

    <!-- ------------------------------------------------------------------------------------ -->

    <div class="row">

        <div class="col-md-6">
            <p><strong>Tipo de solicitud</strong></p>
            <p>{{ $denuncia->tipo_denuncia }}</p>
        </div>

        <div class="col-md-6">
            <p><strong>Status</strong></p>
            <p> <span class="badge badge-pill
                @if($denuncia->status === 'NUEVO')
                    badge-primary
                @elseif($denuncia->status === 'EN PROCESO')
                    badge-warning
                @elseif($denuncia->status === 'ATENDIDA')
                    badge-danger
                @else
                    badge-secondary
                @endif
                ">
                @if($denuncia->status === 'NUEVO')
                    NUEVO
                @elseif($denuncia->status === 'EN PROCESO')
                    EN PROCESO
                @elseif($denuncia->status === 'ATENDIDA')
                    ATENDIDA
                @else
                    Unknown
                @endif
            </span></p>
        </div>

    </div>

    <hr>

    <center><p><strong>Datos de la presunta victima o de la persona que narra los hechos</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Nombre completo</strong><br>{{ $denuncia->victima_nombre }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Sexo</strong><br>{{ $denuncia->victima_sexo }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Edad</strong><br>{{ $denuncia->victima_edad }}</p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Email</strong><br>{{ $denuncia->victima_email }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Celular</strong><br>{{ $denuncia->victima_telefono }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Tipo de Contratación</strong><br>{{ $denuncia->victima_tipo_contratacion }}</p>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <p><strong>Condiciones de vulnerabilidad</strong><br>{{ $denuncia->victima_condiciones_vulnerabilidad }} {{ $denuncia->victima_condiciones_vulnerabilidad_otro }}</p>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->

    <hr>

    <center><p><strong>Unidad laboral</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>CLUES</strong><br>{{ $denuncia->victima_clues }} - {{ $denuncia->clues_nombre }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Municipio</strong><br>{{ $denuncia->clues_municipio_label }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Jurisdiccion</strong><br>{{ $denuncia->clues_jurisdiccion_label }}</p>
        </div>
        
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <p><strong>Área</strong><br>{{ $denuncia->victima_area_adscripcion }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Puesto</strong><br>{{ $denuncia->victima_puesto_desempena }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Jefe inmediato</strong><br>{{ $denuncia->victima_jefe_inmediato }}</p>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <p><strong>Se establecierón médidas de protección</strong><br>{{ $denuncia->victima_medidas_proteccion }}</p>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->

    <hr>

    <center><p><strong>Datos de la persona presunta agresora (en caso de contar con ellos )</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Nombre</strong><br>{{ $denuncia->agresor_nombre }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Sexo</strong><br>{{ $denuncia->agresor_sexo }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Edad</strong><br>{{ $denuncia->agresor_edad }}</p>
        </div>

    </div> 

    <div class="row mt-2">

        <div class="col-md-4">
            <p><strong>Área de adscripción</strong><br>{{ $denuncia->agresor_area }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Puesto</strong></p>
            {{ $denuncia->agresor_puesto }}
        </div>

        <div class="col-md-4">
            <p><strong>Tipo de contratación</strong></p>
            {{ $denuncia->agresor_tipo_contratacion }}
        </div>

    </div>

    <div class="row mt-2">

        <div class="col-md-12">
            <p><strong>Jefe inmediato</strong></p>
            {{ $denuncia->agresor_jefe_inmediato }}
        </div>

    </div>


    <!-- ------------------------------------------------------------------------------------ -->

    

    <hr>

    <center><p><strong>¿Existe alguna relación laboral con la persona que está siendo señalada como presunta agresora?</strong></p></center>

    <hr>

    <div class="row mt-2">
        <p><strong>Relacion laboral</strong><br>
        {{$denuncia->relacion_laboral}} <br> {{$denuncia->relacion_laboral_si}} <br> {{ $denuncia->relacion_laboral_no }}</p>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    <hr>

    <center><p><strong>Narre todo lo relacionado con los hechos ocurridos sobre el hostigamiento sexual y/o acoso sexual en su contra o en contra de otra persona (describa la situación considerando aspectos como tipo de conducta(s), miradas lascivas, tocamientos, comentarios, propuestas sexuales, etcétera, temporalidad, por ejemplo, momento en el que ocurre, circunstancias como horarios, dentro o fuera del trabajo, lugares, ambiente; trate de describir circunstancias de tiempo (¿cuándo?), lugar (¿dónde?) y modo (¿cómo?) lo más claro posible:</strong></p></center>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <p><strong>Situación</strong></p>
            <p>{{ $denuncia->situacion }}</p>

            <p><strong>Como</strong></p>
            <p>{{ $denuncia->como }}</p>
            
            <p><strong>Cuando</strong></p>
            <p>{{ $denuncia->cuando }}</p>

            <p><strong>Donde</strong></p>
            <p>{{ $denuncia->donde }}</p>

        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    <hr>

    <center><p><strong>Si cuenta con elementos que pudieran corroborar los hechos antes narrados, favor de adjuntarlos a continuación (Fotografías, testigos, historial de llamadas, notas en papel de invitaciones, correos electrónicos, mensajes, actividad en redes sociales u otros)</strong></p></center>

    <hr>

    @if($denuncia->documento_uno !== null)
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.detalles', basename($denuncia->documento_uno)) }}">Descargar archivo</a>
    @endif

    @if($denuncia->documento_dos !== null)
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.detalles', basename($denuncia->documento_dos)) }}">Descargar archivo</a>
    @endif

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿La conducta ha ocurrido?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            <p>.</p>
            {{ $denuncia->conducta_ocurrido }}
        </div>

        <div class="col-md-6">
            <p><strong>Fecha aproximada en la que iniciarón las conductas</strong></p>
            {{ $denuncia->conducta_ocurrido_fecha }}
        </div>


    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿Alguna persona o personas presenciaron los hechos narrados</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->persona_testigo }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->persona_testigo_si }}
        </div>


    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>Las personas que han presenciado los hechos narrados, guardan alguna relación con la persona presunta agresora</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->persona_relacion }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->persona_relacion_si }}
        </div>


    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>Identifica un trato diferenciado hacia usted por parte de la persona presunta agresora, antes y después de los hechos narrados (Ha cambiado la relación laboral)</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->persona_trato }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->persona_trato_si }}
        </div>


    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>A partir de lo que ha sucedido con la conducta narrada, ¿usted ha presentado algún tipo de padecimiento físico, como dolor de cabeza, dificultades gástricas u otras enfermedades reiterativas?; ¿Problemas de orden emocional, como miedo, angustia, inseguridad, dificultades para dormir o concentrarse, desánimo, tristeza, entre otras? o ¿Problemas de tipo social que afecten sus relaciones cotidianas?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->padecimiento_fisico }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->padecimiento_fisico_si }}
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿Considera que su integridad física o emocional se encuentra en riesgo?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->integridad }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->integridad_si }}
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿Ha sido amenazada, advertida, coaccionada o intimidada de alguna manera con posibles represalias por negarse a las propuestas o por tratar de detener la situación?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->amenazada }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->amenazada_si }}
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿Hay datos adicionales que puede proporcionar para fortalecer los hechos narrados?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->adicionales }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->adicionales_si }}
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    
    <hr>

    <center><p><strong>¿Ha presentado alguna denuncia formal ante alguna instancia (Comité de ética, Órgano Interno de Control o Ministerio Público)?</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-6">
            {{ $denuncia->denuncia }}
        </div>

        <div class="col-md-6">
            {{ $denuncia->denuncia_si }}
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->

    </div>
    </div>

        </div>

        <div class="col-md-6">

            <div class="card card-purple">

                <div class="card-header">
                    <h3 class="card-title">Seguimiento <small><a href="{{ route('seguimiento.create', $denuncia->id)}} ">Nuevo registro</a></small></h3>
                </div>

                <div class="card-body">

                <ul class="list-group">

                @foreach ($seguimientos as $seguimiento)
                    
                    <li class="list-group-item">
                        <strong>{{ $seguimiento->created_at->format('d/m/Y') }}</strong>
                        <br>
                        {{ $seguimiento->mensaje }}
                    </li>
                
                @endforeach

                </ul>

                </div>

            </div>

            <!-- ----------------------------------------- -->

            <div class="card card-purple">

                <div class="card-header">
                    <h3 class="card-title">Reincidencias <small><a href="{{ route('reincidencia.create', $denuncia->id)}} ">Nuevo registro</a></small></h3>
                </div>

                <div class="card-body">

                <ul class="list-group">

                    @foreach ($reincidencias as $reincidencia)
                        
                        <li class="list-group-item">
                            <strong>{{ $reincidencia->created_at->format('d/m/Y') }}</strong>
                            <br>
                            {{ $reincidencia->descripcion }}

                            <hr>

                            @if($reincidencia->archivo)
                                <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.download', basename($reincidencia->archivo)) }}">Descargar archivo</a>
                            @else
                                
                            @endif
                        </li>
                    
                    @endforeach

                </ul>

                </div>

            </div>

            <!-- ----------------------------------------- -->

            <div class="card card-purple">

                <div class="card-header">
                    <h3 class="card-title">Documentación <small><a href="{{ route('documento.create', $denuncia->id)}} ">Nuevo registro</a></small></h3>
                </div>

                <div class="card-body">

                <ul class="list-group">

                    @foreach ($documentaciones as $documentacion)
                        
                        <li class="list-group-item">
                            <strong>{{ $documentacion->created_at->format('d/m/Y') }}</strong>
                            <br>
                            <strong>{{ $documentacion->nombre }}</strong> | {{ $documentacion->descripcion }}

                            <hr>

                            @if($documentacion->archivo)
                                <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.download', basename($documentacion->archivo)) }}">Descargar archivo</a>
                            @else
                                
                            @endif
                        </li>
                    
                    @endforeach

                </ul>

                </div>

            </div>

            <!-- ----------------------------------------- -->

        </div>

    </div>

    <!-- ---------------------------------------------------------------------------------------------------- -->

  
@stop

@section('footer')
<p>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong></p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

