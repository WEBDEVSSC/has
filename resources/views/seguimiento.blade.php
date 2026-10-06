@extends('adminlte::page')

@section('title', 'Seguimiento')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Hostigamiento y Acoso Sexual
            </h1>
            <p class="text-muted small m-0">Gestión y registro de bitácora de seguimiento</p>
        </div>
        <div>
            <span class="badge badge-pill px-3 py-2" style="background-color: #E8EAF6; color: #3F51B5; font-weight: 600;">
                SSC/HAS/{{ $denuncia->created_at ? $denuncia->created_at->format('Y') : date('Y') }}/{{ $denuncia->folio }}
            </span>
        </div>
    </div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">

        {{-- FORMULARIO DE REGISTRO DE SEGUIMIENTO --}}
        <div class="card border-0 shadow-sm rounded-lg mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-history mr-2" style="color: #3F51B5;"></i> Registrar Nuevo Seguimiento
                </h5>
            </div>

            <form action="{{ route('seguimiento.store') }}" method="POST">
                @csrf
                <!-- Campo oculto para enviar el ID del registro -->
                <input type="hidden" name="id_registro" value="{{ $denuncia->id }}">

                <div class="card-body px-4 pb-2">
                    <div class="form-group">
                        <label for="mensaje" class="font-weight-semibold text-secondary">
                            Descripción del Seguimiento <span class="text-danger">*</span>
                        </label>
                        <textarea id="mensaje" name="mensaje" class="form-control rounded-lg @error('mensaje') is-invalid @enderror" rows="4" placeholder="Describe brevemente las acciones realizadas o avances, sin incluir datos sensibles..." required style="border-color: #CED4DA;">{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small class="form-text text-muted">
                            <i class="fas fa-shield-alt mr-1"></i> Recuerde omitir nombres de víctimas, testigos o información clasificada.
                        </small>
                    </div>
                </div>

                <div class="card-footer bg-light border-0 px-4 py-3 d-flex justify-content-between align-items-center" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <a href="{{ route('denuncias.detalles', $denuncia->id) }}" class="btn btn-outline-secondary px-4 font-weight-bold" style="border-radius: 20px;">
                        <i class="fas fa-arrow-left mr-1"></i> Regresar
                    </a>
                    <button type="submit" class="btn text-white px-4 font-weight-bold" style="background-color: #3F51B5; border-radius: 20px;">
                        <i class="fas fa-save mr-1"></i> Registrar seguimiento
                    </button>
                </div>
            </form>
        </div>

        {{-- LISTADO DE SEGUIMIENTO --}}
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-list-alt mr-2" style="color: #4A148C;"></i> Bitácora de Seguimiento
                </h5>
            </div>

            <div class="card-body px-4 pb-4">
                @if($seguimientos->isEmpty())
                    <div class="alert text-center py-4" style="background-color: #F8F9FA; color: #6C757D; border-radius: 8px;">
                        <i class="fas fa-stream fa-2x mb-2 d-block text-muted"></i>
                        No se han registrado entradas de seguimiento para esta denuncia.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Fecha de Registro</th>
                                    <th style="width: 75%;">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seguimientos as $seguimiento)
                                    <tr>
                                        <td class="text-muted small">
                                            <i class="far fa-calendar-alt mr-1 text-primary"></i>
                                            {{ $seguimiento->created_at ? $seguimiento->created_at->format('d/m/Y H:i') : '-' }}
                                        </td>
                                        <td class="font-weight-semibold text-secondary">
                                            {{ $seguimiento->mensaje }}
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
<script>
    console.log("Vista de seguimiento cargada con éxito.");
</script>
@stop