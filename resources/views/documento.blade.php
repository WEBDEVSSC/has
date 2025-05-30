@extends('adminlte::page')

@section('title', 'Documentación')

@section('content_header')
<h1>Hostigamiento y Acoso Sexual</h1>
@stop

@section('content')



<div class="card card-purple">
    <div class="card-header">
        <h3 class="card-title">Denuncia <span class="badge badge-secondary">SSC/HAS/2025/{{ $denuncia->folio}}</span></h3>
    </div>
    <div class="card-body">

    <form action="{{ route('documento.store', $denuncia->id) }}" method="POST" enctype="multipart/form-data">

    <!-- VARIBALE OOCULTA PARA CAPTURAR EL ID DE LA DENUNCIA -->
    <input type="hidden" name="responsable" value='{{ auth()->id() }}'>
        
    @csrf

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

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
                <label for="file">Archivo</label>
                <input type="file" name="archivo" class="form-control-file">
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('archivo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- ---------------------------------------------------------------------- -->

    </div>
    <div class="card-footer">
        <!-- Contenido del pie de la tarjeta -->
        <button type="submit" class="btn btn-sm btn-dark float-right">Registrar datos</button>
    </div>
</div>

</form>

<!-- ----------------------------------------------------------------------- -->
<!--                           LISTADO DE SEGUIMIENTO                        -->
<!-- ----------------------------------------------------------------------- -->

<div class="card card-purple">
    <div class="card-header">
        <h3 class="card-title">Listado de documentos </h3>
    </div>
    <div class="card-body">

    <!-- Mostrar los registros de reincidencia -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td>{{ $documento->created_at }}</td>
                        <td>{{ $documento->descripcion }}</td> 
                        <td>
                            @if($documento->archivo)
                                <a class="btn btn-info btn-sm btn-block" href="{{ route('file.download', basename($documento->archivo)) }}">Descargar archivo</a>
                            @else
                                No disponible
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

    <!-- --------------------------------------------------------------------- -->
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop