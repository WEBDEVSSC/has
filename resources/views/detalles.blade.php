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
        <h3 class="card-title">Expediente completo de la denuncia :  SSC/HAS/{{ $denuncia->folio}}/2024</h3>
    </div>

   

    <div class="card-body">

    <!-- ------------------------------------------------------------------------------------ -->

    <div class="row">

        <div class="col-md-6">
            <p><strong>Tipo de solicitud</strong></p>
            <p>{{ $denuncia->tipo_solicitud }}</p>
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

    <center><p><strong>Datos generales de contacto</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Nombre completo</strong><br>{{ $denuncia->nombre }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Edad</strong><br>{{ $denuncia->edad }} años cumplidos</p>
        </div>

        <div class="col-md-4">
            <p><strong>Sexo</strong><br>{{ $denuncia->sexo }}</p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Email</strong><br>{{ $denuncia->correo }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Celular</strong><br>{{ $denuncia->celular }}</p>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->

    <hr>

    <center><p><strong>Unidad laboral</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Área de adscripción</strong><br>{{ $denuncia->adscripcion }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Unidad responsable</strong><br>{{ $denuncia->unidad_resposable }}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Municipio</strong><br>{{ $denuncia->municipio }}</p>
        </div>
        
    </div>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Tipo de contratación</strong><br>{{ $denuncia->tipo_contratacion }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Cargo</strong><br>{{ $denuncia->cargo }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Situación de vulnerabilidad</strong><br>{{ $denuncia->vulnerabilidad }}</p>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Cual</strong><br>{{ $denuncia->cual }}</p>
        </div>

    </div>

    <!-- ------------------------------------------------------------------------------------ -->

    <hr>

    <center><p><strong>Datos del denunciado</strong></p></center>

    <hr>

    <div class="row">

        <div class="col-md-4">
            <p><strong>Nombre</strong><br>{{ $denuncia->denunciado_nombre }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Cargo</strong><br>{{ $denuncia->denunciado_cargo }}</p>
        </div>

        <div class="col-md-4">
            <p><strong>Puesto</strong><br>{{ $denuncia->denunciado_puesto }}</p>
        </div>

    </div> 

    <div class="row">

        <div class="col-md-12">
            <p><strong>Antecedentes</strong></p>
            {{ $denuncia->denunciado_antecedentes }}
        </div>

    </div>


    <!-- ------------------------------------------------------------------------------------ -->
    
    <hr>

    <center><p><strong>Hechos</strong></p></center>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <p><strong>Como</strong></p>
            <p>{{ $denuncia->como }}</p>
            
            <p><strong>Cuando</strong></p>
            <p>{{ $denuncia->cuando }}</p>

            <p><strong>Donde</strong></p>
            <p>{{ $denuncia->donde }}</p>

            <p><strong>Testigos</strong></p>
            <p>{{ $denuncia->testigos }}</p>

        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------ -->
    
    <hr>

    <center><p><strong>Evidencia digital</strong></p></center>

    <hr>

    @if($denuncia->imagenuno !== null)
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.detalles', basename($denuncia->imagenuno)) }}">Descargar archivo</a>
    @endif

    @if($denuncia->imagendos !== null)
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('file.detalles', basename($denuncia->imagendos)) }}">Descargar archivo</a>
    @endif

    <!-- ------------------------------------------------------------------------------------ -->

    </div>
    </div>

        </div>

        <div class="col-md-6">

            <div class="card card-purple">

                <div class="card-header">
                    <h3 class="card-title">Seguimiento</h3>
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
                    <h3 class="card-title">Reincidencias</h3>
                </div>

                <div class="card-body">

                <ul class="list-group">

                    @foreach ($reincidencias as $reincidencia)
                        
                        <li class="list-group-item">
                            <strong>{{ $reincidencia->created_at->format('d/m/Y') }}</strong>
                            <br>
                            {{ $reincidencia->descripcion }}
                        </li>
                    
                    @endforeach

                </ul>

                </div>

            </div>

            <!-- ----------------------------------------- -->

            <div class="card card-purple">

                <div class="card-header">
                    <h3 class="card-title">Documentación</h3>
                </div>

                <div class="card-body">

                <ul class="list-group">

                    @foreach ($documentaciones as $documentacion)
                        
                        <li class="list-group-item">
                            <strong>{{ $documentacion->created_at->format('d/m/Y') }}</strong>
                            <br>
                            {{ $documentacion->descripcion }}
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

