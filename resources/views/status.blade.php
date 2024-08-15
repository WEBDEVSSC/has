@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Hostigamiento y Acoso Sexual </h1>
@stop

@section('content')

<div class="card card card-info">
    <div class="card-header">
        <h3 class="card-title">Denuncia <span class="badge badge-secondary">SSC/HAS/{{ $denuncia->folio}}2024</span></h3>
    </div>

    <div class="card-body">

    <!-- ----------------------------------------------------------------------------- -->

    <form action="{{ route('denuncias.update', ['id' => $denuncia->id]) }}" method="POST">
        @csrf

        @method('PUT')

        <!-- Campo oculto para enviar el ID del registro -->
        <input type="hidden" name="id_registro" value="{{ $denuncia->id }}">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="status">Actualización de status:</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="" disabled selected>Selecciona un status</option>
                        <option value="NUEVO" {{ old('contratacion') == 'NUEVO' ? 'selected' : '' }}>NUEVO</option>
                        <option value="EN PROCESO" {{ old('contratacion') == 'EN PROCESO' ? 'selected' : '' }}>EN PROCESO</option>
                        <option value="ATENDIDA" {{ old('contratacion') == 'ATENDIDA' ? 'selected' : '' }}>ATENDIDA</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

    <!-- ----------------------------------------------------------------------------- -->
        
    </div>
    <div class="card-footer">
        <!-- Contenido del pie de la tarjeta -->
        <button type="submit" class="btn btn-info float-right">Actualizar status</button>
    </div>
</div>

</form>

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