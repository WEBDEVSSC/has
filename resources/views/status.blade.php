@extends('adminlte::page')

@section('title', 'Actualizar Estatus')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Hostigamiento y Acoso Sexual
            </h1>
            <p class="text-muted small m-0">Actualización del estado del expediente</p>
        </div>
        <div>
            <span class="badge badge-pill px-3 py-2" style="background-color: #F3E5F5; color: #4A148C; font-weight: 600;">
                SSC/HAS/{{ $denuncia->created_at ? $denuncia->created_at->year : date('Y') }}/{{ $denuncia->folio }}
            </span>
        </div>
    </div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-tasks mr-2" style="color: #4A148C;"></i> Cambiar Estado de la Denuncia
                </h5>
            </div>

            <form action="{{ route('denuncias.update', ['id' => $denuncia->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo oculto para enviar el ID del registro -->
                <input type="hidden" name="id_registro" value="{{ $denuncia->id }}">

                <div class="card-body px-4 pb-3">

                    <!-- Estado actual de la denuncia -->
                    <div class="p-3 mb-4 rounded-lg d-flex align-items-center justify-content-between" style="background-color: #F8F9FA;">
                        <span class="text-muted font-weight-semibold small">Estatus Actual:</span>
                        <span class="badge badge-pill px-3 py-2 font-weight-bold
                            @if($denuncia->status === 'NUEVO')
                                style-badge-nuevo
                            @elseif($denuncia->status === 'EN PROCESO')
                                style-badge-proceso
                            @elseif($denuncia->status === 'ATENDIDA')
                                style-badge-atendida
                            @else
                                badge-secondary
                            @endif
                        ">
                            <i class="fas fa-circle fa-xs mr-1"></i> {{ $denuncia->status ?? 'N/A' }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="status" class="font-weight-semibold text-secondary">
                            Seleccionar Nuevo Estatus <span class="text-danger">*</span>
                        </label>
                        <select id="status" name="status" class="form-control rounded-lg custom-select @error('status') is-invalid @enderror" required style="border-color: #CED4DA; height: calc(2.25rem + 10px);">
                            <option value="" disabled selected>-- Selecciona un nuevo estatus --</option>
                            <option value="NUEVO" {{ (old('status', $denuncia->status) == 'NUEVO') ? 'selected' : '' }}>NUEVO</option>
                            <option value="EN PROCESO" {{ (old('status', $denuncia->status) == 'EN PROCESO') ? 'selected' : '' }}>EN PROCESO</option>
                            <option value="ATENDIDA" {{ (old('status', $denuncia->status) == 'ATENDIDA') ? 'selected' : '' }}>ATENDIDA</option>
                        </select>
                        @error('status')
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
                        <i class="fas fa-sync-alt mr-1"></i> Actualizar Estatus
                    </button>
                </div>
            </form>
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
    .style-badge-nuevo {
        background-color: #E3F2FD;
        color: #0288D1;
    }
    .style-badge-proceso {
        background-color: #FFF8E1;
        color: #F57F17;
    }
    .style-badge-atendida {
        background-color: #E8F5E9;
        color: #2E7D32;
    }
</style>
@stop

@section('js')
<script>
    console.log("Vista de actualización de estatus cargada.");
</script>
@stop