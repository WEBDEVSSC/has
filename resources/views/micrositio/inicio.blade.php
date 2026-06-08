@include('micrositio.partials.header')

<style>
    .hero-section {
        background: linear-gradient(135deg, #6f42c1 0%, #4b2e83 100%);
        color: white;
        border-radius: 20px;
        padding: 60px 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,.15);
    }

    .feature-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: all .3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,.15);
    }

    .feature-card img {
        height: 250px;
        object-fit: cover;
    }

    .feature-card .card-title {
        font-weight: 700;
        color: #4b2e83;
    }

    .btn-purple {
        background-color: #6f42c1;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        color: white;
    }

    .section-title {
        color: #4b2e83;
        font-weight: 700;
    }

    .info-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        padding: 20px;
        border-radius: 10px;
    }
</style>

<div class="container py-4">

<!-- HERO -->
<div class="hero-section mb-5">
    <div class="row align-items-center">

        <div class="col-lg-8">
            <h1 class="display-5 fw-bold mb-4">
                Portal de Denuncias de Hostigamiento y Acoso Sexual
            </h1>

            <p class="lead">
                Bienvenido al espacio institucional de la Secretaría de Salud de Coahuila
                destinado a la recepción y seguimiento de denuncias relacionadas con
                hostigamiento y acoso sexual.
            </p>

            <p>
                Este portal garantiza un proceso seguro, confidencial y respetuoso,
                orientado a proteger la dignidad, integridad y derechos de todas las personas.
            </p>
        </div>

        <div class="col-lg-4 text-center">
            <img src="{{ asset('img/SS-Blanco.png') }}"
                 class="img-fluid"
                 style="max-height:180px;"
                 alt="Secretaría de Salud">
        </div>

    </div>
</div>

<!-- MENSAJE -->
<div class="info-box mb-5">
    <h4 class="section-title mb-3">
        Compromiso Institucional
    </h4>

    <p class="mb-2">
        La Secretaría de Salud de Coahuila mantiene una política de cero tolerancia
        hacia cualquier conducta de hostigamiento o acoso sexual.
    </p>

    <p class="mb-0">
        Toda denuncia recibida será atendida con profesionalismo, confidencialidad,
        imparcialidad y respeto a los derechos humanos.
    </p>
</div>

<!-- OPCIONES -->
<div class="text-center mb-5">
    <h2 class="section-title">
        Servicios Disponibles
    </h2>
    <p class="text-muted">
        Seleccione la opción que corresponda a su situación.
    </p>
</div>

<div class="row g-4">

    <!-- DENUNCIA -->
    <div class="col-md-4">
        <div class="card feature-card">

            <a href="{{ route('formatoDenuncia') }}">
                <img src="{{ asset('img/HAS_NUEVA.png') }}"
                     class="card-img-top"
                     alt="Presentar denuncia">
            </a>

            <div class="card-body text-center">
                <h5 class="card-title">
                    PRESENTAR DENUNCIA
                </h5>

                <p class="card-text">
                    Inicie formalmente una denuncia de hostigamiento o acoso sexual
                    mediante nuestro formulario seguro y confidencial.
                </p>
            </div>

            <div class="card-footer bg-white border-0 text-center pb-4">
                <a href="{{ route('formatoDenuncia') }}"
                   class="btn btn-purple">
                    Ingresar
                </a>
            </div>

        </div>
    </div>

    <!-- SEGUIMIENTO -->
    <div class="col-md-4">
        <div class="card feature-card">

            <a href="{{ route('buzonSeguimiento') }}">
                <img src="{{ asset('img/HAS_SEGUIMIENTO.png') }}"
                     class="card-img-top"
                     alt="Seguimiento">
            </a>

            <div class="card-body text-center">
                <h5 class="card-title">
                    SEGUIMIENTO DE DENUNCIA
                </h5>

                <p class="card-text">
                    Consulte el estado de su denuncia y manténgase informado sobre
                    el avance de su proceso.
                </p>
            </div>

            <div class="card-footer bg-white border-0 text-center pb-4">
                <a href="{{ route('buzonSeguimiento') }}"
                   class="btn btn-purple">
                    Consultar
                </a>
            </div>

        </div>
    </div>

    <!-- REINCIDENCIA -->
    <div class="col-md-4">
        <div class="card feature-card">

            <a href="{{ route('buzonReincidencia') }}">
                <img src="{{ asset('img/HAS_REINCIDENCIA.png') }}"
                     class="card-img-top"
                     alt="Nueva incidencia">
            </a>

            <div class="card-body text-center">
                <h5 class="card-title">
                    NUEVA INCIDENCIA
                </h5>

                <p class="card-text">
                    Reporte nuevos hechos relacionados con una denuncia existente
                    para complementar el expediente correspondiente.
                </p>
            </div>

            <div class="card-footer bg-white border-0 text-center pb-4">
                <a href="{{ route('buzonReincidencia') }}"
                   class="btn btn-purple">
                    Reportar
                </a>
            </div>

        </div>
    </div>

</div>

<!-- FOOTER INFORMATIVO -->
<div class="text-center mt-5 mb-4">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Portal Institucional de Atención,
        Prevención y Seguimiento de Casos de Hostigamiento y Acoso Sexual.
    </small>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
