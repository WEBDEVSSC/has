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

    .gallery-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
        transition: all .3s ease;
        background: #fff;
        margin-bottom: 25px;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,.15);
    }

    .gallery-card img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .info-box {
        background: #f8f9fa;
        border-left: 5px solid #6f42c1;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 40px;
    }
</style>

<div class="container py-4">


<!-- HERO -->
<div class="hero-section text-center">
    <h1 class="display-5 fw-bold mb-3">
        ¿Qué es el Hostigamiento y Acoso Sexual?
    </h1>

    <p class="lead mb-0">
        Conoce las conductas que constituyen hostigamiento y acoso sexual,
        así como la información necesaria para identificarlas, prevenirlas
        y denunciarlas oportunamente.
    </p>
</div>

<!-- DESCRIPCIÓN -->
<div class="info-box">
    <h4 class="section-title mb-3">
        Información Importante
    </h4>

    <p class="mb-0">
        La prevención comienza con la información. A continuación se presentan
        materiales informativos elaborados para sensibilizar y orientar sobre
        situaciones de hostigamiento y acoso sexual dentro de los espacios
        laborales y de convivencia.
    </p>
</div>

<!-- GALERÍA -->
<div class="text-center mb-5">
    <h2 class="section-title">
        Material Informativo
    </h2>
    <p class="text-muted">
        Consulte las siguientes infografías y materiales de orientación.
    </p>
</div>

<div class="row">

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.38_6ba7814c.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_7c2e5927.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.36_6f2fc94a.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.36_54ee37c9.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.36_5597a628.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_56343c0e.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_a2b60a35.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_c45f67fa.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_d98df84c.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.37_e634eb2f.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.38_19e26a99.jpg') }}">
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="gallery-card">
            <img src="{{ asset('img/Imagen de WhatsApp 2025-02-20 a las 12.29.38_3443f4a3.jpg') }}">
        </div>
    </div>

</div>

<!-- PIE -->
<div class="text-center mt-5 mb-4">
    <small class="text-muted">
        Secretaría de Salud de Coahuila · Programa de Prevención y Atención
        del Hostigamiento y Acoso Sexual.
    </small>
</div>


</div>

</body>
</html>
