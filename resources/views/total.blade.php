@extends('adminlte::page')

@section('title', 'Denuncias total')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
<h1>Hostigamiento y Acoso Sexual</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card card-purple">
        <div class="card-header">
        <h3 class="card-title">Total de registros <span class="badge badge-secondary">{{ $totalDenuncias }}</span></h3>
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
    </div>
    <div class="card-body">
        @if ($denuncias->isEmpty())
            <p>No hay nuevas denuncias registradas.</p>
        @else
            <table id="table_id"  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Denunciante</th>
                        <th>Municipio</th>
                        <th>Tipo</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($denuncias as $denuncia)
                        <tr>
                            <td>SSC/HAS/{{ $denuncia->folio }}/2024</td>
                            <td>{{ $denuncia->nombre }}</td>
                            <td>{{ $denuncia->entidad }}</td>
                            <td>
                                <!-- Aplica color rojo si tipo_solicitud es 'ACOSO LABORAL' -->
                                <span class="badge badge-pill {{ $denuncia->tipo_solicitud === 'ACOSO SEXUAL' ? 'badge-danger' : 'badge-secondary' }}">
                                    {{ $denuncia->tipo_solicitud }}
                                </span>
                            </td>
                            <td>{{ $denuncia->created_at }}</td>
                            <td>
                                <!-- -------------------------------------- -->

                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('denuncias.detalles', $denuncia->id) }}">Detalles</a>
                                <a class="dropdown-item" href="{{ route('denuncias.status', $denuncia->id) }}">Actualizar Status</a>
                                <a class="dropdown-item" href="{{ route('seguimiento.create', $denuncia->id) }}">Seguimiento (NOSOTROS)</a>
                                <a class="dropdown-item" href="#">Reincidencia (VICTIMA)</a>
                                <a class="dropdown-item" href="{{ route('documento.create', $denuncia->id) }}">Documentación</a>
                                <a class="dropdown-item" href="#">Imprimir PDF</a>
                                </div>
                            </div>

                            <!-- -------------------------------------- -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
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
    
    <script>$(document).ready( function () {
     $(document).ready(function() {
        $('#table_id').DataTable({
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
} );</script>
@stop