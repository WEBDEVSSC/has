@extends('adminlte::page')

@section('title', 'Detalles de Denuncia')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Expediente: SSC/HAS/{{ $denuncia->created_at ? $denuncia->created_at->year : date('Y') }}/{{ $denuncia->folio }}
            </h1>
            <p class="text-muted small m-0">Detalles completos de la denuncia y panel de seguimiento institucional</p>
        </div>
        <div>
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
                <i class="fas fa-circle fa-xs mr-1"></i> {{ $denuncia->status ?? 'SIN ESTADO' }}
            </span>
        </div>
    </div>
@stop

@section('content')

    {{-- ALERTAS DE SESIÓN CON SWEETALERT --}}
    @if(session('success') || session('reincidencia') || session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Operación Exitosa!',
                    text: "{{ session('success') ?? session('reincidencia') ?? session('status') }}",
                    icon: 'success',
                    confirmButtonColor: '#4A148C',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    <div class="row">
        {{-- COLUMNA IZQUIERDA: EXPEDIENTE Y DETALLES --}}
        <div class="col-lg-7 col-md-12">

            <!-- 1. TIPO Y RELACIÓN LABORAL -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-info-circle mr-2" style="color: #4A148C;"></i> Información General
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <span class="text-muted small d-block font-weight-bold text-uppercase">Tipo de Solicitud / Denuncia</span>
                            <span class="font-weight-semibold text-dark h6">{{ $denuncia->tipo_denuncia ?? 'No especificado' }}</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="text-muted small d-block font-weight-bold text-uppercase">Relación Laboral con el Agresor</span>
                            <span class="font-weight-semibold text-dark">
                                {{ $denuncia->relacion_laboral }}
                                @if($denuncia->relacion_laboral_si) <br><small class="text-muted">{{ $denuncia->relacion_laboral_si }}</small> @endif
                                @if($denuncia->relacion_laboral_no) <br><small class="text-muted">{{ $denuncia->relacion_laboral_no }}</small> @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. DATOS DE LA PRESUNTA VÍCTIMA -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-user-shield mr-2" style="color: #3F51B5;"></i> Presunta Víctima o Denunciante
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Nombre Completo</span>
                            <span class="font-weight-semibold text-dark">{{ $denuncia->victima_nombre ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Sexo</span>
                            <span class="text-dark">{{ $denuncia->victima_sexo ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Edad</span>
                            <span class="text-dark">{{ $denuncia->victima_edad ? $denuncia->victima_edad . ' años' : 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Correo Electrónico</span>
                            <span class="text-dark">{{ $denuncia->victima_email ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Teléfono / Celular</span>
                            <span class="text-dark">{{ $denuncia->victima_telefono ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Tipo de Contratación</span>
                            <span class="badge badge-pill py-1 px-3" style="background-color: #E8EAF6; color: #3F51B5;">
                                {{ $denuncia->victima_tipo_contratacion ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                    @if($denuncia->victima_condiciones_vulnerabilidad || $denuncia->victima_condiciones_vulnerabilidad_otro)
                        <div class="p-3 rounded-lg mt-2" style="background-color: #F8F9FA;">
                            <span class="text-muted small d-block font-weight-bold">Condiciones de Vulnerabilidad:</span>
                            <span class="text-dark small">
                                {{ $denuncia->victima_condiciones_vulnerabilidad }} {{ $denuncia->victima_condiciones_vulnerabilidad_otro }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- 3. UNIDAD LABORAL -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-hospital-user mr-2" style="color: #00897B;"></i> Adscripción y Unidad Laboral
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">CLUES</span>
                            <span class="text-dark font-weight-semibold">{{ $denuncia->victima_clues }}</span>
                            <small class="d-block text-muted">{{ $denuncia->clues_nombre }}</small>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Municipio</span>
                            <span class="text-dark">{{ $denuncia->clues_municipio_label ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Jurisdicción</span>
                            <span class="text-dark">{{ $denuncia->clues_jurisdiccion_label ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Área</span>
                            <span class="text-dark">{{ $denuncia->victima_area_adscripcion ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Puesto</span>
                            <span class="text-dark">{{ $denuncia->victima_puesto_desempena ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Jefe Inmediato</span>
                            <span class="text-dark">{{ $denuncia->victima_jefe_inmediato ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="border-top pt-3">
                        <span class="text-muted small d-block font-weight-bold">Medidas de Protección Establecidas:</span>
                        <p class="text-dark m-0">{{ $denuncia->victima_medidas_proteccion ?? 'No registradas' }}</p>
                    </div>
                </div>
            </div>

            <!-- 4. DATOS DEL PRESUNTO AGRESOR -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-user-slash mr-2" style="color: #EC407A;"></i> Persona Presunta Agresora
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Nombre</span>
                            <span class="font-weight-semibold text-dark">{{ $denuncia->agresor_nombre ?? 'No identificado' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Sexo</span>
                            <span class="text-dark">{{ $denuncia->agresor_sexo ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Edad</span>
                            <span class="text-dark">{{ $denuncia->agresor_edad ? $denuncia->agresor_edad . ' años' : 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Área de Adscripción</span>
                            <span class="text-dark">{{ $denuncia->agresor_area ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Puesto</span>
                            <span class="text-dark">{{ $denuncia->agresor_puesto ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small d-block font-weight-bold">Tipo de Contratación</span>
                            <span class="text-dark">{{ $denuncia->agresor_tipo_contratacion ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div>
                        <span class="text-muted small d-block font-weight-bold">Jefe Inmediato del Agresor:</span>
                        <span class="text-dark">{{ $denuncia->agresor_jefe_inmediato ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- 5. NARRACIÓN DE LOS HECHOS -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-align-left mr-2" style="color: #4A148C;"></i> Narración de los Hechos
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="mb-3 p-3 rounded" style="background-color: #F8F9FA;">
                        <span class="text-muted small d-block font-weight-bold text-uppercase mb-1">Descripción de la Situación:</span>
                        <p class="text-dark mb-0 text-justify">{{ $denuncia->situacion ?? 'Sin detalle' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <span class="text-muted small d-block font-weight-bold">¿Cómo sucedió?</span>
                            <span class="text-dark small">{{ $denuncia->como ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4 mb-2">
                            <span class="text-muted small d-block font-weight-bold">¿Cuándo sucedió?</span>
                            <span class="text-dark small">{{ $denuncia->cuando ?? 'N/A' }}</span>
                        </div>
                        <div class="col-md-4 mb-2">
                            <span class="text-muted small d-block font-weight-bold">¿Dónde sucedió?</span>
                            <span class="text-dark small">{{ $denuncia->donde ?? 'N/A' }}</span>
                        </div>
                    </div>

                    {{-- ARCHIVOS DE EVIDENCIA INICIALES --}}
                    @if($denuncia->documento_uno !== null || $denuncia->documento_dos !== null)
                        <div class="border-top pt-3 mt-3">
                            <span class="text-muted small d-block font-weight-bold mb-2">Evidencias Adjuntas Iniciales:</span>
                            <div class="d-flex flex-wrap gap-2">
                                @if($denuncia->documento_uno !== null)
                                    <a class="btn btn-sm btn-outline-primary mr-2 mb-2 font-weight-bold" style="border-radius:20px;" href="{{ route('file.detalles', basename($denuncia->documento_uno)) }}">
                                        <i class="fas fa-paperclip mr-1"></i> Evidencia 1
                                    </a>
                                @endif
                                @if($denuncia->documento_dos !== null)
                                    <a class="btn btn-sm btn-outline-primary mb-2 font-weight-bold" style="border-radius:20px;" href="{{ route('file.detalles', basename($denuncia->documento_dos)) }}">
                                        <i class="fas fa-paperclip mr-1"></i> Evidencia 2
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- 6. EVALUACIÓN Y FACTORES COMPLEMENTARIOS -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-clipboard-check mr-2" style="color: #78909C;"></i> Evaluación y Factores Complementarios
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless align-middle mb-0">
                            <tbody>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿La conducta sigue ocurriendo?</td>
                                    <td>{{ $denuncia->conducta_ocurrido ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->conducta_ocurrido_fecha }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Hubo personas testigos?</td>
                                    <td>{{ $denuncia->persona_testigo ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->persona_testigo_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Testigos tienen relación con el agresor?</td>
                                    <td>{{ $denuncia->persona_relacion ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->persona_relacion_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Identifica trato diferenciado?</td>
                                    <td>{{ $denuncia->persona_trato ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->persona_trato_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Padecimientos físicos/emocionales?</td>
                                    <td>{{ $denuncia->padecimiento_fisico ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->padecimiento_fisico_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Riesgo a su integridad?</td>
                                    <td>{{ $denuncia->integridad ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->integridad_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Ha recibido amenazas o coacción?</td>
                                    <td>{{ $denuncia->amenazada ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->amenazada_si }}</small></td>
                                </tr>
                                <tr class="border-bottom-soft">
                                    <td class="font-weight-semibold text-secondary">¿Datos adicionales?</td>
                                    <td>{{ $denuncia->adicionales ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->adicionales_si }}</small></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-semibold text-secondary">¿Denuncia previa en otra instancia?</td>
                                    <td>{{ $denuncia->denuncia ?? 'N/A' }}</td>
                                    <td><small class="text-muted">{{ $denuncia->denuncia_si }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- COLUMNA DERECHA: SEGUIMIENTO, REINCIDENCIAS Y DOCUMENTACIÓN --}}
        <div class="col-lg-5 col-md-12">

            <!-- SEGUIMIENTO -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-history mr-2" style="color: #3F51B5;"></i> Seguimiento
                    </h5>
                    <a href="{{ route('seguimiento.create', $denuncia->id) }}" class="btn btn-sm text-white font-weight-bold px-3" style="background-color: #3F51B5; border-radius: 20px;">
                        <i class="fas fa-plus fa-xs mr-1"></i> Nuevo Registro
                    </a>
                </div>
                <div class="card-body px-4 pb-4">
                    @if($seguimientos->isEmpty())
                        <p class="text-muted small text-center my-3">No hay registros de seguimiento registrados.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($seguimientos as $seguimiento)
                                <li class="list-group-item px-0 py-3 border-bottom-soft">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="badge badge-pill px-2 py-1" style="background-color: #E8EAF6; color: #3F51B5; font-size: 0.75rem;">
                                            <i class="far fa-calendar-alt mr-1"></i> {{ $seguimiento->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <p class="text-dark mb-0 small">{{ $seguimiento->mensaje }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- REINCIDENCIAS -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-exclamation-triangle mr-2" style="color: #EC407A;"></i> Reincidencias
                    </h5>
                    <a href="{{ route('reincidencia.create', $denuncia->id) }}" class="btn btn-sm text-white font-weight-bold px-3" style="background-color: #EC407A; border-radius: 20px;">
                        <i class="fas fa-plus fa-xs mr-1"></i> Nuevo Registro
                    </a>
                </div>
                <div class="card-body px-4 pb-4">
                    @if($reincidencias->isEmpty())
                        <p class="text-muted small text-center my-3">No existen reportes de reincidencia.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($reincidencias as $reincidencia)
                                <li class="list-group-item px-0 py-3 border-bottom-soft">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="badge badge-pill px-2 py-1" style="background-color: #FCE4EC; color: #C2185B; font-size: 0.75rem;">
                                            <i class="far fa-calendar-alt mr-1"></i> {{ $reincidencia->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <p class="text-dark mb-2 small">{{ $reincidencia->descripcion }}</p>
                                    @if($reincidencia->archivo)
                                        <a class="btn btn-sm btn-outline-danger font-weight-bold btn-block" style="border-radius:20px;" href="{{ route('file.download', basename($reincidencia->archivo)) }}">
                                            <i class="fas fa-download mr-1"></i> Descargar Adjunto
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- DOCUMENTACIÓN EXTRA -->
            <div class="card border-0 shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                        <i class="fas fa-folder-open mr-2" style="color: #4A148C;"></i> Documentación Adjunta
                    </h5>
                    <a href="{{ route('documento.create', $denuncia->id) }}" class="btn btn-sm text-white font-weight-bold px-3" style="background-color: #4A148C; border-radius: 20px;">
                        <i class="fas fa-plus fa-xs mr-1"></i> Agregar Documento
                    </a>
                </div>
                <div class="card-body px-4 pb-4">
                    @if($documentaciones->isEmpty())
                        <p class="text-muted small text-center my-3">No hay documentos anexos.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach ($documentaciones as $documentacion)
                                <li class="list-group-item px-0 py-3 border-bottom-soft">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <strong class="text-dark small">{{ $documentacion->nombre }}</strong>
                                        <span class="badge badge-pill px-2 py-1" style="background-color: #F3E5F5; color: #4A148C; font-size: 0.70rem;">
                                            {{ $documentacion->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                    <p class="text-muted small mb-2">{{ $documentacion->descripcion }}</p>
                                    @if($documentacion->archivo)
                                        <a class="btn btn-sm btn-outline-info font-weight-bold btn-block" style="border-radius:20px;" href="{{ route('documento.download', basename($documentacion->archivo)) }}">
                                            <i class="fas fa-download mr-1"></i> Descargar Archivo
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
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
    .border-bottom-soft {
        border-bottom: 1px solid #F1F3F5;
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
    console.log("Expediente cargado con éxito.");
</script>
@stop