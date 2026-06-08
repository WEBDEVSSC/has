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

    .objective-card {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 15px;
        transition: all .3s ease;
    }

    .objective-card:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
    }

    .objective-card h5 {
        color: #4b2e83;
        font-weight: 700;
        margin-bottom: 10px;
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
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        color: white;
    }

    .info-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
    }
</style>

<div class="container py-4">

<!-- HERO -->
<div class="hero-section text-center">
    <h1 class="display-5 fw-bold mb-3">
        Pronunciamiento de Cero Tolerancia
    </h1>

    <p class="lead mb-0">
        Compromiso institucional para prevenir, atender y erradicar cualquier
        manifestación de hostigamiento, acoso sexual, violencia y discriminación.
    </p>
</div>

<div class="row g-4">

    <!-- INFORMACIÓN -->
    <div class="col-lg-4">

        <div class="info-card">

            <h3 class="section-title mb-4">
                ¿Qué es el Pronunciamiento de Cero Tolerancia?
            </h3>

            <p class="text-muted">
                El Pronunciamiento de Cero Tolerancia es una declaración oficial
                mediante la cual la institución reafirma su compromiso con la
                construcción de ambientes laborales seguros, inclusivos y
                respetuosos para todas las personas.
            </p>

            <div class="info-box">
                <strong>Compromiso Institucional:</strong><br>
                Ninguna conducta de hostigamiento, acoso sexual, violencia,
                discriminación o abuso será tolerada dentro de la Secretaría
                de Salud de Coahuila.
            </div>

            <h4 class="section-title mb-3">
                Objetivos Principales
            </h4>

            <div class="objective-card">
                <h5>1. Ambiente Seguro y Respetuoso</h5>
                <p class="mb-0">
                    Garantizar espacios laborales donde todas las personas
                    puedan desempeñarse con dignidad y seguridad.
                </p>
            </div>

            <div class="objective-card">
                <h5>2. Normas Claras de Conducta</h5>
                <p class="mb-0">
                    Definir comportamientos aceptables e inaceptables dentro
                    de la institución.
                </p>
            </div>

            <div class="objective-card">
                <h5>3. Acción Inmediata</h5>
                <p class="mb-0">
                    Atender oportunamente cualquier conducta que contravenga
                    las políticas institucionales.
                </p>
            </div>

            <div class="objective-card">
                <h5>4. Transparencia y Responsabilidad</h5>
                <p class="mb-0">
                    Fortalecer la rendición de cuentas y la correcta gestión
                    de los casos presentados.
                </p>
            </div>

            <div class="objective-card">
                <h5>5. Capacitación y Sensibilización</h5>
                <p class="mb-0">
                    Promover la formación continua para prevenir conductas
                    indebidas y fomentar una cultura de respeto.
                </p>
            </div>

            <div class="text-center mt-4">
                <a href="{{ asset('docs/PRONUNCIAMIENTO_12-09-2024.pdf') }}"
                   target="_blank"
                   class="btn btn-purple">
                    Descargar Documento PDF
                </a>
            </div>

        </div>

    </div>

    <!-- PDF -->
    <div class="col-lg-8">

        <div class="pdf-card">

            <div class="p-3 border-bottom bg-light">
                <h5 class="mb-0 section-title">
                    Consulta del Pronunciamiento Oficial
                </h5>
            </div>

            <iframe
                src="{{ asset('docs/PRONUNCIAMIENTO_12-09-2024.pdf') }}"
                width="100%"
                height="1200"
                style="border:none;">
            </iframe>

        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5 mb-4">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Política Institucional de Cero Tolerancia
        al Hostigamiento y Acoso Sexual.
    </small>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
