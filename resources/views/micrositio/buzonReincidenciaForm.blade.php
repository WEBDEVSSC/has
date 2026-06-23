@include('micrositio.partials.header')

<style>
    .hero-section {
        background: linear-gradient(135deg, #6f42c1 0%, #4b2e83 100%);
        color: white;
        border-radius: 20px;
        padding: 40px;
        margin-top: 20px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,.15);
    }

    .form-card {
        background: #fff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
    }

    .section-title {
        color: #4b2e83;
        font-weight: 700;
    }

    .highlight-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 25px;
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

    <!-- ENCABEZADO -->
    <div class="hero-section text-center">
        <h1 class="display-6 fw-bold">
            Reincidencia de Denuncia
        </h1>

        <p class="lead mb-0">
            Folio SSC/HAS/2025/{{ $denuncia->folio }}
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="form-card">

                <h3 class="section-title mb-4">
                    Registro de Reincidencia
                </h3>

                <div class="highlight-box">
                    Describa de forma clara los nuevos hechos relacionados con
                    la denuncia previamente registrada. Si cuenta con evidencia,
                    puede anexarla al formulario.
                </div>

                <form action="{{ route('buzonReincidenciaStore') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <input type="hidden"
                           name="id_denuncia"
                           value="{{ $denuncia->id }}">

                    <input type="hidden"
                           name="folio"
                           value="{{ $denuncia->folio }}">

                    <!-- DESCRIPCIÓN -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Descripción del Evento
                        </label>

                        <textarea
                            name="descripcion"
                            rows="8"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            placeholder="Describa detalladamente los nuevos hechos...">{{ old('descripcion') }}</textarea>

                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- ARCHIVO -->

                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Evidencia (Opcional)
                        </label>

                        <input type="file"
                               name="archivo"
                               class="form-control @error('archivo') is-invalid @enderror">

                        @error('archivo')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- CAPTCHA -->

                    <div class="captcha-box mb-4">

                        <center>

                            <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

                            <div class="cf-turnstile"
                                data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"
                                data-theme="light">
                            </div>

                            </center>

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-purple">
                            REGISTRAR REINCIDENCIA
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>