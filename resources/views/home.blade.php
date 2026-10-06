@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Dashboard {{ now()->year }}
            </h1>
            <p class="text-muted small m-0">Panel de control de denuncias e indicadores institucionales</p>
        </div>
    </div>
@stop

@section('content')

<!-- TARJETAS ESTADÍSTICAS SUPERIORES CON PALETA COMBINADA -->
<div class="row">
    <!-- Nuevas (Morado Principal) -->
    <div class="col-lg-3 col-sm-6 col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100 overflow-hidden" style="background: linear-gradient(135deg, #4A148C 0%, #6A1B9A 100%); color: #fff;">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <span class="text-uppercase small font-weight-bold" style="letter-spacing: 1px; opacity: 0.85;">Nuevas</span>
                    <h2 class="display-4 font-weight-bold mb-0 mt-1">{{ $totalDenunciasNuevas }}</h2>
                </div>
                <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(255, 255, 255, 0.15); width: 60px; height: 60px;">
                    <i class="fas fa-folder-plus fa-2x text-white"></i>
                </div>
            </div>
            <a href="{{ route('denuncias.nuevas') }}" class="card-footer text-white text-decoration-none d-flex align-items-center justify-content-between py-2 px-4" style="background: rgba(0, 0, 0, 0.12); border: none;">
                <span class="small font-weight-bold">Ver Detalles</span>
                <i class="fas fa-arrow-right fa-sm"></i>
            </a>
        </div>
    </div>

    <!-- En Proceso (Azul Índigo) -->
    <div class="col-lg-3 col-sm-6 col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100 overflow-hidden" style="background: linear-gradient(135deg, #3F51B5 0%, #5C6BC0 100%); color: #fff;">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <span class="text-uppercase small font-weight-bold" style="letter-spacing: 1px; opacity: 0.85;">En Proceso</span>
                    <h2 class="display-4 font-weight-bold mb-0 mt-1">{{ $totalDenunciasEnProceso }}</h2>
                </div>
                <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(255, 255, 255, 0.15); width: 60px; height: 60px;">
                    <i class="fas fa-spinner fa-2x text-white"></i>
                </div>
            </div>
            <a href="{{ route('denuncias.enproceso') }}" class="card-footer text-white text-decoration-none d-flex align-items-center justify-content-between py-2 px-4" style="background: rgba(0, 0, 0, 0.12); border: none;">
                <span class="small font-weight-bold">Ver Detalles</span>
                <i class="fas fa-arrow-right fa-sm"></i>
            </a>
        </div>
    </div>

    <!-- Atendidas (Teal / Verde Turquesa) -->
    <div class="col-lg-3 col-sm-6 col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100 overflow-hidden" style="background: linear-gradient(135deg, #00897B 0%, #26A69A 100%); color: #fff;">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <span class="text-uppercase small font-weight-bold" style="letter-spacing: 1px; opacity: 0.85;">Atendidas</span>
                    <h2 class="display-4 font-weight-bold mb-0 mt-1">{{ $totalDenunciasAtendidas }}</h2>
                </div>
                <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(255, 255, 255, 0.15); width: 60px; height: 60px;">
                    <i class="fas fa-check-circle fa-2x text-white"></i>
                </div>
            </div>
            <a href="{{ route('denuncias.atendidas') }}" class="card-footer text-white text-decoration-none d-flex align-items-center justify-content-between py-2 px-4" style="background: rgba(0, 0, 0, 0.12); border: none;">
                <span class="small font-weight-bold">Ver Detalles</span>
                <i class="fas fa-arrow-right fa-sm"></i>
            </a>
        </div>
    </div>

    <!-- Total (Gris / Azul Oscuro Neutro) -->
    <div class="col-lg-3 col-sm-6 col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100 overflow-hidden" style="background: linear-gradient(135deg, #37474F 0%, #546E7A 100%); color: #fff;">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <span class="text-uppercase small font-weight-bold" style="letter-spacing: 1px; opacity: 0.85;">Total</span>
                    <h2 class="display-4 font-weight-bold mb-0 mt-1">{{ $totalDenunciasNuevas + $totalDenunciasEnProceso + $totalDenunciasAtendidas }}</h2>
                </div>
                <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(255, 255, 255, 0.15); width: 60px; height: 60px;">
                    <i class="fas fa-chart-pie fa-2x text-white"></i>
                </div>
            </div>
            <a href="{{ route('denuncias.total') }}" class="card-footer text-white text-decoration-none d-flex align-items-center justify-content-between py-2 px-4" style="background: rgba(0, 0, 0, 0.12); border: none;">
                <span class="small font-weight-bold">Ver Detalles</span>
                <i class="fas fa-arrow-right fa-sm"></i>
            </a>
        </div>
    </div>
</div>

<!-- SECCIÓN: TOP MUNICIPIOS Y BARRAS POR MES -->
<div class="row">
    <!-- Tabla Top 5 Municipios -->
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-map-marker-alt mr-2" style="color: #4A148C;"></i> Top 5 de municipios con más denuncias
                </h5>
            </div>
            <div class="card-body px-4 pb-4">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead class="text-muted border-bottom">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Municipio</th>
                                <th class="text-right" style="width: 100px;">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom-soft">
                                <td class="font-weight-bold text-muted">1</td>
                                <td class="font-weight-semibold text-dark">{{ $municipio }}</td>
                                <td class="text-right">
                                    <span class="badge badge-pill py-2 px-3" style="background-color: #F3E5F5; color: #4A148C; font-weight: 600;">{{ $cantidadRepeticiones }}</span>
                                </td>
                            </tr>
                            <tr class="border-bottom-soft">
                                <td class="font-weight-bold text-muted">2</td>
                                <td class="font-weight-semibold text-dark">{{ $municipio_dos }}</td>
                                <td class="text-right">
                                    <span class="badge badge-pill py-2 px-3" style="background-color: #E8EAF6; color: #3F51B5; font-weight: 600;">{{ $cantidadRepeticiones_dos }}</span>
                                </td>
                            </tr>
                            <tr class="border-bottom-soft">
                                <td class="font-weight-bold text-muted">3</td>
                                <td class="font-weight-semibold text-dark">{{ $municipio_tres }}</td>
                                <td class="text-right">
                                    <span class="badge badge-pill py-2 px-3" style="background-color: #E0F2F1; color: #00897B; font-weight: 600;">{{ $cantidadRepeticiones_tres }}</span>
                                </td>
                            </tr>
                            <tr class="border-bottom-soft">
                                <td class="font-weight-bold text-muted">4</td>
                                <td class="font-weight-semibold text-dark">{{ $municipio_cuatro }}</td>
                                <td class="text-right">
                                    <span class="badge badge-pill py-2 px-3" style="background-color: #ECEFF1; color: #455A64; font-weight: 600;">{{ $cantidadRepeticiones_cuatro }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">5</td>
                                <td class="font-weight-semibold text-dark">{{ $municipio_cinco }}</td>
                                <td class="text-right">
                                    <span class="badge badge-pill py-2 px-3" style="background-color: #FCE4EC; color: #C2185B; font-weight: 600;">{{ $cantidadRepeticiones_cinco }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfica Registros por Mes -->
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-chart-bar mr-2" style="color: #3F51B5;"></i> Registros por mes
                </h5>
            </div>
            <div class="card-body px-4 pb-4">
                <div style="position: relative; height: 280px; width: 100%;">
                    <canvas id="denunciasPorMes"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECCIÓN: GRÁFICAS DE DONA (DISTRIBUCIÓN) -->
<div class="row">
    <!-- Jurisdicción -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-3 text-center">
                <h6 class="font-weight-bold m-0" style="color: #2C3E50;">Jurisdicción</h6>
            </div>
            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                <div style="position: relative; width: 100%; max-height: 230px;">
                    <canvas id="registrosPorJurisdiccion"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Sexo -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-3 text-center">
                <h6 class="font-weight-bold m-0" style="color: #2C3E50;">Sexo</h6>
            </div>
            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                <div style="position: relative; width: 100%; max-height: 230px;">
                    <canvas id="registrosPorSexo"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tipo de contratación -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-3 text-center">
                <h6 class="font-weight-bold m-0" style="color: #2C3E50;">Tipo de Contratación</h6>
            </div>
            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                <div style="position: relative; width: 100%; max-height: 230px;">
                    <canvas id="registrosTipoSolicitud"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tipo de denuncia -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-3 text-center">
                <h6 class="font-weight-bold m-0" style="color: #2C3E50;">Tipo de Denuncia</h6>
            </div>
            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                <div style="position: relative; width: 100%; max-height: 230px;">
                    <canvas id="registrosTipoContratacion"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECCIÓN: RANGOS DE EDAD -->
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-lg h-100">
            <div class="card-header bg-white border-0 pt-4 px-3 text-center">
                <h6 class="font-weight-bold m-0" style="color: #2C3E50;">Rangos de Edad</h6>
            </div>
            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                <div style="position: relative; width: 100%; max-height: 240px;">
                    <canvas id="registrosRangosDeEdad"></canvas>
                </div>
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
    .table td, .table th {
        padding: 0.85rem 0.5rem;
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // PALETA COMBINADA (Morado + Índigo + Teal + Coral + Azul Claro + Slate)
    const combinedPalette = [
        '#4A148C', // Morado Institucional
        '#3F51B5', // Azul Índigo
        '#00897B', // Teal / Verde Agua
        '#EC407A', // Coral / Rosa
        '#0288D1', // Azul Cielo
        '#7E57C2', // Lavanda
        '#00A896', // Verde Turquesa
        '#78909C'  // Gris Slate
    ];

    // Opciones generales para gráficas de Dona (Doughnut)
    const donutOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    boxWidth: 8,
                    font: { size: 11 }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(44, 62, 80, 0.9)',
                titleFont: { size: 13 },
                bodyFont: { size: 12 },
                padding: 10,
                cornerRadius: 8
            }
        },
        cutout: '68%'
    };

    // 1. Gráfica Denuncias por Mes
    const ctxMes = document.getElementById('denunciasPorMes').getContext('2d');
    new Chart(ctxMes, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: 'Registros',
                data: [
                    {{$totalDenunciasEnero}}, {{$totalDenunciasFebrero}}, {{$totalDenunciasMarzo}},
                    {{$totalDenunciasAbril}}, {{$totalDenunciasMayo}}, {{$totalDenunciasJunio}},
                    {{$totalDenunciasJulio}}, {{$totalDenunciasAgosto}}, {{$totalDenunciasSeptiembre}},
                    {{$totalDenunciasOctubre}}, {{$totalDenunciasNoviembre}}, {{$totalDenunciasDiciembre}}
                ],
                backgroundColor: '#3F51B5',
                hoverBackgroundColor: '#303F9F',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#F1F3F5', drawBorder: false }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // 2. Gráfica Registros por Jurisdicción
    new Chart(document.getElementById('registrosPorJurisdiccion').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['J1', 'J2', 'J3', 'J4', 'J5', 'J6', 'J7', 'J8'],
            datasets: [{
                data: [
                    {{$totaldenunciasJurisdiccionUno}}, {{$totaldenunciasJurisdiccionDos}},
                    {{$totaldenunciasJurisdiccionTres}}, {{$totaldenunciasJurisdiccionCuatro}},
                    {{$totaldenunciasJurisdiccionCinco}}, {{$totaldenunciasJurisdiccionSeis}},
                    {{$totaldenunciasJurisdiccionSiete}}, {{$totaldenunciasJurisdiccionOcho}}
                ],
                backgroundColor: combinedPalette,
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: donutOptions
    });

    // 3. Gráfica Registros por Sexo (Contrastado entre Morado y Teal)
    new Chart(document.getElementById('registrosPorSexo').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Masculino', 'Femenino'],
            datasets: [{
                data: [{{$totalDenunciasMasculino}}, {{$totalDenunciasFemenino}}],
                backgroundColor: ['#3F51B5', '#EC407A'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: donutOptions
    });

    // 4. Tipo de Contratación
    new Chart(document.getElementById('registrosTipoSolicitud').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Confianza', 'Base', 'Contrato', 'En Formación', 'Otra'],
            datasets: [{
                data: [
                    {{$totaldenunciasConfianza}}, {{$totaldenunciasBase}},
                    {{$totaldenunciasContrato}}, {{$totaldenunciasEnFormacion}},
                    {{$totaldenunciasOtra}}
                ],
                backgroundColor: ['#4A148C', '#3F51B5', '#00897B', '#0288D1', '#78909C'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: donutOptions
    });

    // 5. Tipo de Denuncia
    new Chart(document.getElementById('registrosTipoContratacion').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Acoso', 'Hostigamiento'],
            datasets: [{
                data: [{{$totaldenunciasAcosoSexual}}, {{$totaldenunciasHostigamiento}}],
                backgroundColor: ['#4A148C', '#00897B'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: donutOptions
    });

    // 6. Rangos de Edad
    new Chart(document.getElementById('registrosRangosDeEdad').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['1° Infancia', 'Infancia', 'Adolescencia', 'Juventud', 'Adultez', 'Adulto Mayor'],
            datasets: [{
                data: [
                    {{$primeraInfancia}}, {{$infancia}}, {{$adolescencia}},
                    {{$juventud}}, {{$adultez}}, {{$personaMayor}}
                ],
                backgroundColor: combinedPalette.slice(0, 6),
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: donutOptions
    });
});
</script>
@stop