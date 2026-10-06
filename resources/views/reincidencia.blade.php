@extends('adminlte::page')

@section('title', 'Reincidencia')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Hostigamiento y Acoso Sexual
            </h1>
            <p class="text-muted small m-0">Registro y consulta de casos de reincidencia</p>
        </div>
        <div>
            <span class="badge badge-pill px-3 py-2" style="background-color: #F3E5F5; color: #4A148C; font-weight: 600;">
                SSC/HAS/{{ $denuncia->created_at ? $denuncia->created_at->format('Y') : date('Y') }}/{{ $denuncia->folio }}
            </span>
        </div>
    </div>
@stop

@section('content')

@if(session('reincidencia'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Registro Guardado!',
                text: "{{ session('reincidencia') }}",
                icon: 'success',
                confirmButtonColor: '#4A148C',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif

<div class="row justify-content-center">
    <div class="col-md-12">

        {{-- FORMULARIO DE REGISTRO DE REINCIDENCIA --}}
        <div class="card border-0 shadow-sm rounded-lg mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-exclamation-triangle mr-2" style="color: #C62828;"></i> Registrar Reincidencia
                </h5>
            </div>

            <form action="{{ route('reincidencia.store', $denuncia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="responsable" value="{{ auth()->id() }}">

                <div class="card-body px-4 pb-2">
                    <div class="form-group">
                        <label for="descripcion" class="font-weight-semibold text-secondary">
                            Descripción del Incidente de Reincidencia <span class="text-danger">*</span>
                        </label>
                        <textarea id="descripcion" name="descripcion" class="form-control rounded-lg @error('descripcion') is-invalid @enderror" rows="4" placeholder="Describa los hechos ocurridos..." required style="border-color: #CED4DA;">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="archivo" class="font-weight-semibold text-secondary">
                            Adjuntar Evidencia Documental <small class="text-muted">(Opcional, Máx. 10 MB)</small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="archivo" class="custom-file-input @error('archivo') is-invalid @enderror" id="archivo" lang="es">
                            <label class="custom-file-label" for="archivo" data-browse="Buscar">Seleccionar archivo...</label>
                        </div>
                        @error('archivo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-light border-0 px-4 py-3 d-flex justify-content-between align-items-center" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <a href="{{ route('denuncias.detalles', $denuncia->id) }}" class="btn btn-outline-secondary px-4 font-weight-bold" style="border-radius: 20px;">
                        <i class="fas fa-arrow-left mr-1"></i> Regresar
                    </a>
                    <button type="submit" class="btn text-white px-4 font-weight-bold" style="background-color: #4A148C; border-radius: 20px;">
                        <i class="fas fa-plus-circle mr-1"></i> Registrar Datos
                    </button>
                </div>
            </form>
        </div>

        {{-- LISTADO DE REINCIDENCIAS --}}
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-layer-group mr-2" style="color: #4A148C;"></i> Historial de Reincidencias
                </h5>
            </div>

            <div class="card-body px-4 pb-4">
                @if($reincidencias->isEmpty())
                    <div class="alert text-center py-4" style="background-color: #F8F9FA; color: #6C757D; border-radius: 8px;">
                        <i class="fas fa-check-circle fa-2x mb-2 d-block text-success"></i>
                        No existen reportes de reincidencia registrados para esta denuncia.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Fecha Registro</th>
                                    <th style="width: 55%;">Descripción</th>
                                    <th style="width: 25%;" class="text-center">Archivo Adjunto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reincidencias as $reincidencia)
                                    <tr>
                                        <td class="text-muted small">
                                            <i class="far fa-calendar-alt mr-1 text-primary"></i>
                                            {{ $reincidencia->created_at ? $reincidencia->created_at->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td class="font-weight-semibold text-secondary">
                                            {{ $reincidencia->descripcion }}
                                        </td>
                                        <td class="text-center">
                                            @if($reincidencia->archivo)
                                                <a class="btn btn-outline-primary btn-sm px-3 font-weight-bold" style="border-radius: 15px;" href="{{ route('file.download', basename($reincidencia->archivo)) }}">
                                                    <i class="fas fa-download mr-1"></i> Descargar
                                                </a>
                                            @else
                                                <span class="badge badge-light text-muted px-3 py-2 font-weight-normal">
                                                    <i class="fas fa-times-circle mr-1"></i> Sin archivo
                                                </span>
                                            @endif
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
    .custom-file-label::after {
        content: "Buscar";
        background-color: #E9ECEF;
    }
</style>
@stop

@section('js')
<script>
    // Mostrar dinámicamente el nombre del archivo seleccionado en el input file de Bootstrap
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('custom-file-input')) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Seleccionar archivo...';
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        }
    });
</script>
@stop