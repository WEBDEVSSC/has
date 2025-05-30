@extends('adminlte::page')

@section('title', 'Seguimiento')

@section('content_header')
<h1>Hostigamiento y Acoso Sexual </h1>
@stop

@section('content')


<div class="card card card-purple">
    <div class="card-header">
        <h3 class="card-title">Denuncia <span class="badge badge-secondary">SSC/HAS/{{$denuncia->created_at->format('Y')}}/{{ $denuncia->folio}}</span></h3>
    </div>
    <div class="card-body">

    <form action="{{ route('seguimiento.store') }}" method="POST">
        @csrf

        <!-- Campo oculto para enviar el ID del registro -->
        <input type="hidden" name="id_registro" value="{{ $denuncia->id }}">

        <div class="form-group">
            <label for="mensaje">Describe brevemente el seguimiento, sin incluir datos sensibles:</label>
            <textarea id="mensaje" name="mensaje" class="form-control" rows="4" required>{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    <!-- ----------------------------------------------------------------------- -->

    </div>
    <div class="card-footer">
        <!-- Contenido del pie de la tarjeta -->
        <button type="submit" class="btn btn-dark float-right">Registrar seguimiento</button>
    </div>
    </form>
</div>

<!-- ----------------------------------------------------------------------- -->
<!--                           LISTADO DE SEGUIMIENTO                        -->
<!-- ----------------------------------------------------------------------- -->

<div class="card card card-purple">
    <div class="card-header">
        <h3 class="card-title">Listado de seguimiento </h3>
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
                @foreach ($seguimientos as $seguimiento)
                    <tr>
                        <td>{{ $seguimiento->created_at->format('d/m/Y') }}</td>
                        <td>{{ $seguimiento->mensaje }}</td> 
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

    <!-- --------------------------------------------------------------------- -->
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