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
        background: #fff;
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
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .step-card h6 {
        color: #4b2e83;
        font-weight: 700;
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
        transition: .3s;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        color: white;
    }
</style>

<div class="container py-4">

<!-- HERO -->
<div class="hero-section text-center">
    <h1 class="display-5 fw-bold mb-3">
        Seguimiento de Denuncia
    </h1>

    <p class="lead mb-0">
        Consulte el estado y avance de su denuncia de manera segura y confidencial.
    </p>
</div>

<div class="row g-4">

    <!-- INFORMACIÓN -->
    <div class="col-lg-6">

        <div class="info-card">

            <h3 class="section-title mb-4">
                ¿Cómo funciona el seguimiento?
            </h3>

            <p class="text-muted">
                El seguimiento permite conocer las acciones realizadas por la
                institución para atender su denuncia y garantizar que sea
                tratada con la seriedad y confidencialidad que merece.
            </p>

            <div class="step-card">
                <h6>1. Revisión del Caso</h6>
                <p class="mb-0">
                    Se analiza la información proporcionada para comprender
                    el contexto y los hechos reportados.
                </p>
            </div>

            <div class="step-card">
                <h6>2. Investigación</h6>
                <p class="mb-0">
                    Se recopilan evidencias, testimonios e información
                    necesaria para la atención del caso.
                </p>
            </div>

            <div class="step-card">
                <h6>3. Acciones Implementadas</h6>
                <p class="mb-0">
                    Se documentan todas las medidas adoptadas en respuesta
                    a la denuncia.
                </p>
            </div>

            <div class="step-card">
                <h6>4. Comunicación</h6>
                <p class="mb-0">
                    Se mantiene informado al denunciante sobre el avance
                    del procedimiento.
                </p>
            </div>

            <div class="step-card">
                <h6>5. Resolución</h6>
                <p class="mb-0">
                    Se informa el resultado final y las determinaciones
                    emitidas por la autoridad competente.
                </p>
            </div>

        </div>

    </div>

    <!-- FORMULARIO -->
    <div class="col-lg-6">

        <div class="form-card">

            <h3 class="section-title mb-4">
                Consultar Seguimiento
            </h3>

            <form action="{{ route('buzonSeguimientoShow') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Número de Folio
                    </label>

                    <p class="text-muted small">
                        Capture únicamente los últimos números de su folio.
                        Ejemplo: si su folio es
                        SSC/HAS/2025/000123, ingrese solamente:
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

                <div class="captcha-box mb-4">

                    <img
                        src="{{ captcha_src('flat') }}"
                        onclick="this.src='{{ captcha_src('flat') }}'+Math.random()"
                        style="cursor:pointer;"
                        class="img-fluid rounded">

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
                        CONSULTAR SEGUIMIENTO
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<div class="text-center mt-5">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Sistema de Seguimiento de Denuncias
        de Hostigamiento y Acoso Sexual.
    </small>
</div>

</div>

@if(session('error'))

<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        title: 'Error',
        text: "{{ session('error') }}",
        icon: 'error',
        confirmButtonText: 'Aceptar'
    });
});
</script>

@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
