@include('micrositio.partials.header')

<style>
    .hero-section {
        background: linear-gradient(135deg, #6f42c1 0%, #4b2e83 100%);
        color: white;
        border-radius: 20px;
        padding: 50px 40px;
        margin-top: 20px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,.15);
    }

    .section-title {
        color: #4b2e83;
        font-weight: 700;
    }

    .info-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
        height: 100%;
    }

    .pdf-card {
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
    }

    .btn-purple {
        background-color: #6f42c1;
        color: white;
        border-radius: 50px;
        padding: 10px 25px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        color: white;
    }

    .highlight-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }
</style>

<div class="container py-4">

<!-- HERO -->
<div class="hero-section text-center">
    <h1 class="display-5 fw-bold mb-3">
        Protocolo para la Prevención, Atención y Sanción del Hostigamiento y Acoso Sexual
    </h1>

    <p class="lead mb-0">
        Documento oficial aplicable en la Secretaría de Salud de Coahuila y sus
        organismos públicos descentralizados.
    </p>
</div>

<div class="row g-4">

    <!-- INFORMACIÓN -->
    <div class="col-lg-4">

        <div class="info-card">

            <h3 class="section-title mb-4">
                Información General
            </h3>

            <p class="text-muted">
                En el marco de la estrategia institucional de
                <strong>Cero Tolerancia al Hostigamiento y Acoso Sexual</strong>,
                la Secretaría de Salud de Coahuila promueve ambientes laborales
                seguros, respetuosos e incluyentes.
            </p>

            <p class="text-muted">
                Para ello se implementa el
                <strong>Protocolo para la Prevención, Atención y Sanción del
                Hostigamiento Sexual y Acoso Sexual en la Administración Pública
                del Estado de Coahuila de Zaragoza</strong>, en coordinación con
                la Secretaría de las Mujeres y la Secretaría de Fiscalización y
                Rendición de Cuentas.
            </p>

            <div class="highlight-box">
                <strong>Importante:</strong><br>
                Todo servidor público debe conocer los mecanismos de prevención,
                atención y denuncia establecidos en el presente protocolo.
            </div>

            <div class="mt-4 text-center">
                <a href="{{ asset('docs/protocolo_acoso.pdf') }}"
                   target="_blank"
                   class="btn btn-purple">
                    Descargar Protocolo PDF
                </a>
            </div>

        </div>

    </div>

    <!-- PDF -->
    <div class="col-lg-8">

        <div class="pdf-card">

            <div class="p-3 border-bottom bg-light">
                <h5 class="mb-0 section-title">
                    Consulta del Documento Oficial
                </h5>
            </div>

            <iframe
                src="{{ asset('docs/protocolo_acoso.pdf') }}"
                width="100%"
                height="1200px"
                style="border:none;">
            </iframe>

        </div>

    </div>

</div>

<!-- PIE -->
<div class="text-center mt-5 mb-4">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Estrategia de Cero Tolerancia al
        Hostigamiento y Acoso Sexual.
    </small>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
