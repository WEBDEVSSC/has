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

    .info-card,
    .form-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
        height: 100%;
    }

    .section-title {
        color: #4b2e83;
        font-weight: 700;
    }

    .step-card {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 15px;
        transition: all .3s ease;
    }

    .step-card:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
    }

    .step-card h6 {
        color: #4b2e83;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .captcha-box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
    }

    .btn-purple {
        background-color: #6f42c1;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all .3s ease;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        color: white;
    }

    .highlight-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
    }
</style>

<div class="container py-4">

<!-- HERO -->
<div class="hero-section text-center">
    <h1 class="display-5 fw-bold mb-3">
        Reincidencia de Denuncia
    </h1>

    <p class="lead mb-0">
        Reporte nuevos hechos relacionados con una denuncia previamente registrada
        para fortalecer el seguimiento y la atención del caso.
    </p>
</div>

<div class="row g-4">

    <!-- INFORMACIÓN -->
    <div class="col-lg-6">

        <div class="info-card">

            <h3 class="section-title mb-4">
                ¿Qué es una reincidencia?
            </h3>

            <p class="text-muted">
                Una reincidencia ocurre cuando se presentan nuevos hechos o conductas
                relacionados con una denuncia previamente registrada. Su reporte es
                fundamental para garantizar una atención integral y la adopción de
                medidas adicionales cuando sean necesarias.
            </p>

            <div class="highlight-box">
                <strong>Importante:</strong><br>
                La reincidencia permite fortalecer la investigación y documentar
                cualquier nueva situación relacionada con el caso original.
            </div>

            <h4 class="section-title mb-3">
                Proceso de Seguimiento
            </h4>

            <div class="step-card">
                <h6>1. Reevaluación del Caso</h6>
                <p class="mb-0">
                    Se analiza la nueva información junto con el historial
                    completo de la denuncia original.
                </p>
            </div>

            <div class="step-card">
                <h6>2. Investigación Ampliada</h6>
                <p class="mb-0">
                    Se incorporan nuevas evidencias, testimonios y elementos
                    relevantes para fortalecer el expediente.
                </p>
            </div>

            <div class="step-card">
                <h6>3. Acciones Complementarias</h6>
                <p class="mb-0">
                    Se implementan medidas adicionales de atención, prevención
                    o sanción según corresponda.
                </p>
            </div>

            <div class="step-card">
                <h6>4. Comunicación Continua</h6>
                <p class="mb-0">
                    Se mantiene informado al denunciante sobre el avance de
                    las acciones derivadas de la reincidencia.
                </p>
            </div>

            <div class="step-card">
                <h6>5. Resolución Actualizada</h6>
                <p class="mb-0">
                    Se emite una respuesta integral considerando tanto la
                    denuncia inicial como los nuevos hechos reportados.
                </p>
            </div>

        </div>

    </div>

    <!-- FORMULARIO -->
    <div class="col-lg-6">

        <div class="form-card">

            <h3 class="section-title mb-4">
                Registrar Reincidencia
            </h3>

            <form action="{{ route('buzonReincidenciaCreate') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Número de Folio
                    </label>

                    <p class="text-muted small">
                        Capture únicamente los últimos números de su folio.
                        Por ejemplo, si su folio es:
                        <strong>SSC/HAS/2025/000123</strong>,
                        deberá ingresar únicamente:
                        <strong>000123</strong>.
                    </p>

                    <input
                        type="number"
                        id="folio"
                        name="folio"
                        value="{{ old('folio') }}"
                        class="form-control @error('folio') is-invalid @enderror"
                        placeholder="000123"
                        required>

                    @error('folio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- CAPTCHA -->

                <div class="captcha-box mb-4">

                    <img
                        src="{{ captcha_src('flat') }}"
                        onclick="this.src='{{ captcha_src('flat') }}'+Math.random()"
                        style="cursor:pointer;"
                        class="img-fluid rounded"
                        alt="Captcha">

                    <div class="mt-2">
                        <small class="text-muted">
                            Haga clic sobre la imagen para generar un nuevo código.
                        </small>
                    </div>

                    <input
                        type="text"
                        name="captcha"
                        class="form-control mt-3 @error('captcha') is-invalid @enderror"
                        placeholder="Ingrese el código de la imagen">

                    @error('captcha')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-purple">
                        PRESENTAR REINCIDENCIA
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Sistema de Atención y Seguimiento
        de Casos de Hostigamiento y Acoso Sexual.
    </small>
</div>

</div>

@if(session('reincidencia'))

<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Éxito',
        text: "{{ session('reincidencia') }}",
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
});
</script>

@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
