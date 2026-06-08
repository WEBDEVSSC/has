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

    .table-purple thead {
        background: #6f42c1;
        color: white;
    }

    .table-purple {
        border-radius: 12px;
        overflow: hidden;
    }
</style>

<div class="container py-4">

    <!-- HERO -->
    <div class="hero-section text-center">
        <h1 class="display-5 fw-bold mb-3">
            Resultados de la Búsqueda
        </h1>

        <p class="lead mb-0">
            SSC/HAS/{{ $denuncia->folio }}
        </p>
    </div>

    <div class="row g-4">

        <!-- INFORMACIÓN -->
        <div class="col-lg-5">

            <div class="info-card">

                <h3 class="section-title mb-4">
                    Seguimiento de la Denuncia
                </h3>

                <p class="text-muted">
                    A continuación se muestran todos los seguimientos
                    registrados para esta denuncia.
                </p>

                <div class="step-card">
                    <h6>Información Importante</h6>
                    <p class="mb-0">
                        Los registros se muestran ordenados por fecha,
                        comenzando por los más recientes.
                    </p>
                </div>

                <div class="step-card">
                    <h6>¿Existe reincidencia?</h6>
                    <p class="mb-0">
                        Si ha vuelto a presentarse una situación relacionada
                        con esta denuncia, puede generar una reincidencia
                        para que sea incorporada al expediente.
                    </p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('buzonReincidencia') }}"
                       class="btn btn-purple">
                        PRESENTAR REINCIDENCIA
                    </a>
                </div>

            </div>

        </div>

        <!-- TABLA DE SEGUIMIENTOS -->
        <div class="col-lg-7">

            <div class="form-card">

                <h3 class="section-title mb-4">
                    Historial de Seguimientos
                </h3>

                <div class="table-responsive">

                    <table class="table table-striped table-hover table-purple align-middle">

                        <thead>
                            <tr>
                                <th>Seguimiento</th>
                                <th width="180">Fecha</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($seguimientos as $seguimiento)

                                <tr>
                                    <td>
                                        {{ $seguimiento->mensaje }}
                                    </td>

                                    <td>
                                        {{ $seguimiento->created_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="2" class="text-center text-muted py-4">
                                        No hay seguimientos registrados.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

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
