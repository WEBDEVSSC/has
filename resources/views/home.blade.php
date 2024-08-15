@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">

<div class="col-lg-3 col-6">

    <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{$totalDenunciasNuevas}}</h3>
            <p>Nuevas</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('denuncias.nuevas') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
    </div>

</div>


<div class="col-lg-3 col-6">

    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{$totalDenunciasEnProceso}}<sup style="font-size: 20px"></sup></h3>
            <p>En proceso</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('denuncias.enproceso') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
    </div>

</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{$totalDenunciasAtendidas}}</h3>
            <p>Atendidas</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('denuncias.atendidas') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
    </div>

</div>


<div class="col-lg-3 col-6">

    <div class="small-box bg-dark">
        <div class="inner">
            <h3>{{ $totalDenunciasNuevas+$totalDenunciasEnProceso+$totalDenunciasAtendidas }}</h3>
            <p>Total</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('denuncias.total') }}" class="small-box-footer">Detalles <i class="fas fa-arrow-circle-right"></i></a>
    </div>

</div>

</div>

<!-- --------------------------------------------------------- -->

<div class="row">
    <div class="col-md-6">

        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top 5 de municipios con más denuncias</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                <thead>
                <tr>
                <th style="width: 10px">#</th>
                <th>Municipio</th>
                <th style="width: 40px">Cantidad</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>1.</td>
                    <td>{{ $municipio }}</td>
                    <td><span class="badge bg-info">{{ $cantidadRepeticiones }}</span></td>
                </tr>

                <tr>
                    <td>2.</td>
                    <td>{{ $municipio_dos }}</td>
                    <td><span class="badge bg-info">{{ $cantidadRepeticiones_dos }}</span></td>
                </tr>

                <tr>
                    <td>3.</td>
                    <td>{{ $municipio_tres }}</td>
                    <td><span class="badge bg-info">{{ $cantidadRepeticiones_tres }}</span></td>
                </tr>

                <tr>
                    <td>4.</td>
                    <td>{{ $municipio_cuatro }}</td>
                    <td><span class="badge bg-info">{{ $cantidadRepeticiones_cuatro }}</span></td>
                </tr>

                <tr>
                    <td>5.</td>
                    <td>{{ $municipio_cinco }}</td>  
                    <td><span class="badge bg-info">{{ $cantidadRepeticiones_cinco }}</span></td>
                </tr>

                </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-6">

    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registros por mes</h3>
            </div>
            <div class="card-body">

                <div>
                    <canvas id="denunciasPorMes"></canvas>
                </div>
            </div>
    </div>

    


    </div>
</div>

<div class="row">
    <div class="col-md-4">

        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registros por jurisdicción</h3>
                </div>
                <div class="card-body">

                    <div>
                        <canvas id="registrosPorJurisdiccion" width="400" height="400"></canvas>
                    </div>

                </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registros por sexo</h3>
                </div>
                <div class="card-body">

                    <div>
                        <canvas id="registrosPorSexo" width="400" height="400"></canvas>
                    </div>

                </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registros por sexo</h3>
                </div>
                <div class="card-body">

                    <div>
                        <canvas id="myDoughnutChart" width="400" height="400"></canvas>
                    </div>

                </div>
        </div>

    </div>
</div>



<!-- --------------------------------------------------------- -->

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('denunciasPorMes');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [{
        label: 'Total de registros',
        data: [{{$totalDenunciasEnero}}, 19, 3, 5, 2, 3,5, 6, 7, 2, 12, 36],
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgb(201, 203, 207)',
      'rgb(201, 203, 207)',
      'rgb(201, 203, 207)',
      'rgb(201, 203, 207)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script>
    // Espera a que el contenido del DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorJurisdiccion').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['J1', 'J2', 'J3', 'J4', 'J5', 'J6', 'J7', 'J8', 'OC',],
            datasets: [{
                label: 'Número de votos',
                data: [12, 19, 3, 56, 87, 63, 41, 25, 31],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});

</script>

<script>
    // Espera a que el contenido del DOM esté cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtén el contexto del canvas
    var ctx = document.getElementById('registrosPorSexo').getContext('2d');
    
    // Crea la gráfica de dona
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Masculino', 'Femenino'],
            datasets: [{
                label: 'Número de votos',
                data: [69, 180],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});

</script>
@stop