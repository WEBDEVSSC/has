@include('micrositio.partials.header')

<br>

<!-- -------------------------- -->

<div class="container mx-auto p-4">

    <center><h3 class="text-3xl font-bold dark:text-purple-600">Protocolo para la prevención, atención y sanción del hostigamiento y acoso sexual</h3></center>

</div>

<div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="col-span-1">

        <p class="mb-3 text-gray-500 dark:text-black">Por medio del presente, me permito informarle que, en el marco de la estrategia de Cero Tolerancia contra el Hostigamiento y Acoso Sexual en los ambientes laborales de la Secretaría de Salud y sus organismos públicos descentralizados, se ha establecido la aplicabilidad del Protocolo para la Prevención, Atención y Sanción del Hostigamiento Sexual y Acoso Sexual en la Administración Pública del Estado de Coahuila de Zaragoza, en coordinación con la Secretaría de las Mujeres y la Secretaría de Fiscalización y Rendición de Cuentas. Dicho protocolo está disponible en el sitio web oficial</p>        

    </div>

    <div class="col-span-1">
        <iframe src="{{ asset('docs/protocolo_acoso.pdf') }}" width="100%" height="1200px">
            Este navegador no soporta PDFs. Por favor descarga el PDF para verlo: 
            <a href="{{ asset('docs/protocolo_acoso.pdf') }}">Descargar PDF</a>.
        </iframe>
    </div>

</div>

<!-- -------------------------- -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>