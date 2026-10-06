@extends('adminlte::page')

@section('title', 'Denuncias en proceso')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Hostigamiento y Acoso Sexual
            </h1>
            <p class="text-muted small m-0">Gestión y seguimiento de denuncias en proceso</p>
        </div>
    </div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-lg">
            <!-- Encabezado con acento Azul Índigo para 'En proceso' -->
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-spinner mr-2" style="color: #3F51B5;"></i> Denuncias en Proceso
                    <span class="badge badge-pill ml-2 px-3 py-1" style="background-color: #E8EAF6; color: #3F51B5; font-weight: 600;">
                        {{ $totalDenuncias }}
                    </span>
                </h5>
            </div>

            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Éxito',
                            text: "{{ session('success') }}",
                            icon: 'success',
                            confirmButtonColor: '#3F51B5',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                </script>
            @endif

            <div class="card-body px-4 pb-4">
                @if ($denuncias->isEmpty())
                    <div class="alert text-center py-4" style="background-color: #F8F9FA; color: #6C757D; border-radius: 8px;">
                        <i class="fas fa-folder-open fa-2x mb-2 d-block text-muted"></i>
                        No hay denuncias en proceso actualmente.
                    </div>
                @else
                    <div class="table-responsive">
                        <table id="table_id" class="table table-hover align-middle mb-0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Denunciante</th>
                                    <th>Tipo</th>
                                    <th>Registro</th>
                                    <th class="text-center" style="width: 120px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($denuncias as $denuncia)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold text-dark">
                                                SSC/HAS/{{ $denuncia->created_at ? \Carbon\Carbon::parse($denuncia->created_at)->format('Y') : date('Y') }}/{{ $denuncia->folio }}
                                            </span>
                                        </td>
                                        <td class="font-weight-semibold text-secondary">
                                            {{ $denuncia->nombre }}
                                        </td>
                                        <td>
                                            @if($denuncia->tipo_solicitud === 'ACOSO SEXUAL')
                                                <span class="badge badge-pill px-3 py-2" style="background-color: #FCE4EC; color: #C2185B; font-weight: 600;">
                                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $denuncia->tipo_solicitud }}
                                                </span>
                                            @else
                                                <span class="badge badge-pill px-3 py-2" style="background-color: #E8EAF6; color: #3F51B5; font-weight: 600;">
                                                    {{ $denuncia->tipo_solicitud }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-muted small">
                                            {{ $denuncia->created_at ? \Carbon\Carbon::parse($denuncia->created_at)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop{{ $denuncia->id }}" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 20px;">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm rounded-lg" aria-labelledby="btnGroupDrop{{ $denuncia->id }}">
                                                    <a class="dropdown-item py-2" href="{{ route('denuncias.detalles', $denuncia->id) }}">
                                                        <i class="fas fa-eye text-primary mr-2"></i> Detalles
                                                    </a>
                                                    <a class="dropdown-item py-2" href="{{ route('denuncias.status', $denuncia->id) }}">
                                                        <i class="fas fa-sync-alt text-info mr-2"></i> Actualizar Status
                                                    </a>
                                                    <a class="dropdown-item py-2" href="{{ route('seguimiento.create', $denuncia->id) }}">
                                                        <i class="fas fa-tasks text-purple mr-2" style="color: #4A148C;"></i> Seguimiento (NOSOTROS)
                                                    </a>
                                                    <a class="dropdown-item py-2" href="{{ route('reincidencia.create', $denuncia->id) }}">
                                                        <i class="fas fa-user-shield text-warning mr-2"></i> Reincidencia (VÍCTIMA)
                                                    </a>
                                                    <a class="dropdown-item py-2" href="{{ route('documento.create', $denuncia->id) }}">
                                                        <i class="fas fa-file-alt text-secondary mr-2"></i> Documentación
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item py-2 text-danger" target="_blank" href="{{ route('generar.pdf', $denuncia->id) }}">
                                                        <i class="fas fa-file-pdf mr-2"></i> Imprimir PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('footer')
<div class="text-center text-muted py-2">
    <small>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong>. Todos los derechos reservados.</small>
</div>
@stop

@section('css')
<style>
    body {
        background-color: #F4F6F9 !important;
        font-family: 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }
    .card {
        border-radius: 12px !important;
    }
    .table thead th {
        border-bottom: 1px solid #E9ECEF !important;
        border-top: none !important;
        color: #6C757D;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table td {
        vertical-align: middle !important;
        border-top: 1px solid #F1F3F5 !important;
        padding: 0.9rem 0.75rem !important;
    }
    .dropdown-menu {
        min-width: 220px;
        padding: 0.5rem 0;
    }
    .dropdown-item {
        font-size: 0.9rem;
        color: #495057;
    }
    .dropdown-item:hover {
        background-color: #F8F9FA;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sSearch":         "Buscar:",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
        });
    });
</script>
@stop