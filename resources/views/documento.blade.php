@extends('adminlte::page')

@section('title', 'Documentación')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Hostigamiento y Acoso Sexual
            </h1>
            <p class="text-muted small m-0">Gestión y registro de documentación adjunta al expediente</p>
        </div>
    </div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">

        {{-- FORMULARIO DE REGISTRO DE DOCUMENTACIÓN --}}
        <div class="card border-0 shadow-sm rounded-lg mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-file-signature mr-2" style="color: #4A148C;"></i> Registrar Documentación
                </h5>
                <span class="badge badge-pill px-3 py-2" style="background-color: #F3E5F5; color: #4A148C; font-weight: 600;">
                    SSC/HAS/{{ $denuncia->created_at ? $denuncia->created_at->year : date('Y') }}/{{ $denuncia->folio }}
                </span>
            </div>

            <form action="{{ route('documento.store', $denuncia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- VARIABLE OCULTA PARA CAPTURAR EL ID DEL RESPONSABLE -->
                <input type="hidden" name="responsable" value="{{ auth()->id() }}">

                <div class="card-body px-4 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre" class="font-weight-semibold text-secondary">
                                    Nombre del Documento <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="nombre" name="nombre" class="form-control rounded-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej. Oficio de notificación, Acta de hechos..." required style="border-color: #CED4DA;">
                                @error('nombre')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion" class="font-weight-semibold text-secondary">
                                    Descripción <span class="text-danger">*</span>
                                </label>
                                <textarea id="descripcion" name="descripcion" class="form-control rounded-lg @error('descripcion') is-invalid @enderror" rows="3" placeholder="Ingrese una breve descripción de este archivo..." required style="border-color: #CED4DA;">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="archivo" class="font-weight-semibold text-secondary">
                                    Adjuntar Archivo
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('archivo') is-invalid @enderror" id="archivo" name="archivo">
                                    <label class="custom-file-label rounded-lg text-muted" for="archivo" data-browse="Elegir">Seleccionar archivo...</label>
                                </div>
                                @error('archivo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light border-0 px-4 py-3 d-flex justify-content-between align-items-center" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <a href="{{ route('denuncias.detalles', $denuncia->id) }}" class="btn btn-outline-secondary px-4 font-weight-bold" style="border-radius: 20px;">
                        <i class="fas fa-arrow-left mr-1"></i> Regresar
                    </a>
                    <button type="submit" class="btn text-white px-4 font-weight-bold" style="background-color: #4A148C; border-radius: 20px;">
                        <i class="fas fa-save mr-1"></i> Registrar datos
                    </button>
                </div>
            </form>
        </div>

        {{-- LISTADO DE DOCUMENTOS --}}
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-folder-open mr-2" style="color: #3F51B5;"></i> Listado de Documentos
                </h5>
            </div>

            <div class="card-body px-4 pb-4">
                @if($documentos->isEmpty())
                    <div class="alert text-center py-4" style="background-color: #F8F9FA; color: #6C757D; border-radius: 8px;">
                        <i class="fas fa-file-alt fa-2x mb-2 d-block text-muted"></i>
                        No se han registrado documentos para esta denuncia.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Registro</th>
                                    <th style="width: 55%;">Descripción</th>
                                    <th class="text-center" style="width: 25%;">Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td class="text-muted small">
                                            {{ $documento->created_at ? \Carbon\Carbon::parse($documento->created_at)->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td class="font-weight-semibold text-secondary">
                                            {{ $documento->descripcion }}
                                        </td> 
                                        <td class="text-center">
                                            @if($documento->archivo)
                                                <a class="btn btn-sm btn-outline-info px-3 font-weight-bold" href="{{ route('documento.download', basename($documento->archivo)) }}" style="border-radius: 20px;">
                                                    <i class="fas fa-download mr-1"></i> Descargar archivo
                                                </a>
                                            @else
                                                <span class="badge badge-pill px-3 py-2" style="background-color: #E9ECEF; color: #6C757D; font-weight: 600;">
                                                    No disponible
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
        content: "Elegir";
        background-color: #4A148C;
        color: white;
        border-radius: 0 0.5rem 0.5rem 0;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function () {
        // Muestra el nombre del archivo seleccionado en el campo custom-file de Bootstrap
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName || 'Seleccionar archivo...');
        });
    });
</script>
@stop