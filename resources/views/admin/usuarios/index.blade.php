@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Gestión de Usuarios
            </h1>
            <p class="text-muted small m-0">Panel de administración de accesos y cuentas del sistema</p>
        </div>
        <div>
            <a href="{{ route('usuarios.create') }}" class="btn text-white font-weight-bold px-3 py-2" style="background-color: #2E7D32; border-radius: 20px;">
                <i class="fas fa-user-plus mr-1"></i> Nuevo Usuario
            </a>
        </div>
    </div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-users-cog mr-2" style="color: #2E7D32;"></i> Listado de Usuarios Registrados
                </h5>
            </div>

            <div class="card-body px-4 pb-4">
                @if($usuarios->isEmpty())
                    <div class="alert text-center py-4" style="background-color: #F8F9FA; color: #6C757D; border-radius: 8px;">
                        <i class="fas fa-user-slash fa-2x mb-2 d-block text-muted"></i>
                        No se encontraron usuarios registrados en la plataforma.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width: 10%;" class="text-center">ID</th>
                                    <th style="width: 35%;">Nombre Completo</th>
                                    <th style="width: 35%;">Correo Electrónico</th>
                                    <th style="width: 20%;" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge badge-light px-2 py-1" style="border: 1px solid #CED4DA; color: #495057;">
                                                #{{ $usuario->id }}
                                            </span>
                                        </td>
                                        <td class="font-weight-bold" style="color: #2C3E50;">
                                            <i class="fas fa-user-circle text-muted mr-1"></i> {{ $usuario->name }}
                                        </td>
                                        <td class="text-muted">
                                            <i class="fas fa-envelope text-muted mr-1"></i> {{ $usuario->email }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-outline-primary btn-sm px-3 font-weight-semibold" style="border-radius: 15px 0 0 15px;" title="Editar">
                                                    <i class="fas fa-edit mr-1"></i> Editar
                                                </a>
                                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" id="form-delete-{{ $usuario->id }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger btn-sm px-3 font-weight-semibold btn-delete" data-id="{{ $usuario->id }}" style="border-radius: 0 15px 15px 0;" title="Eliminar">
                                                        <i class="fas fa-trash-alt mr-1"></i> Eliminar
                                                    </button>
                                                </form>
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
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
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
</style>
@stop

@section('js')
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Operación Exitosa!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#2E7D32',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Confirmación interactiva de eliminación con SweetAlert2
        const deleteButtons = document.querySelectorAll('.btn-delete');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: '¿Confirmar eliminación?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#C62828',
                    cancelButtonColor: '#6C757D',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-delete-' + userId).submit();
                    }
                });
            });
        });
    });
</script>
@stop