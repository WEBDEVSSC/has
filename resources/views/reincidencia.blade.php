@extends('adminlte::page')

@section('title', 'Reincidencia')

@section('plugins.Sweetalert2', true)

@section('content_header')
<h1>Hostigamiento y Acoso Sexual</h1>
@stop

@section('content')

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

<div class="card card card-purple">
    <div class="card-header">
        <h3 class="card-title">Denuncia <span class="badge badge-secondary">SSC/HAS/{{ $denuncia->created_at->year }}/{{ $denuncia->folio}}</span></h3>
    </div>
    <div class="card-body">

    <form action="{{ route('reincidencia.store', $denuncia->id) }}" method="POST" enctype="multipart/form-data">

    <!-- VARIBALE OOCULTA PARA CAPTURAR EL ID DE LA DENUNCIA -->
    <input type="hidden" name="responsable" value='{{ auth()->id() }}'>
        
    @csrf

    <!-- ---------------------------------------------------------------------- -->
    
    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required>{{ old('descripcion') }}</textarea>
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- ---------------------------------------------------------------------- -->

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="file">Archivo <small>Máximo 10 M.B.</small></label>
                <input type="file" name="archivo" class="form-control-file">
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('archivo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- ---------------------------------------------------------------------- -->

    <div class="card-footer">
        <!-- Contenido del pie de la tarjeta -->
        <button type="submit" class="btn btn-dark float-right">Registrar datos</button>
    </div>
        
    </form>

    </div>

</div>

<!-- ----------------------------------------------------------------------- -->
<!--                           LISTADO DE DENUNCIAS                          -->
<!-- ----------------------------------------------------------------------- -->

<div class="card card card-purple">
    <div class="card-header">
        <h3 class="card-title">Listado de reincidencias </h3>
    </div>
    <div class="card-body">

    <!-- Mostrar los registros de reincidencia -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Descripción</th>
                    <th>Archivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reincidencias as $reincidencia)
                    <tr>
                        <td>{{ $reincidencia->created_at }}</td>
                        <td>{{ $reincidencia->descripcion }}</td>
                        <td>
                            @if($reincidencia->archivo)
                                <a class="btn btn-info btn-sm btn-block" href="{{ route('file.download', basename($reincidencia->archivo)) }}">Descargar archivo</a>
                            @else
                                No disponible
                            @endif
                        </td>
                        <!-- Agrega más columnas según lo necesario -->
                    </tr>
                @endforeach
            </tbody>
        </table>

    <!-- --------------------------------------------------------------------- -->
 
    </div>
</div>
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