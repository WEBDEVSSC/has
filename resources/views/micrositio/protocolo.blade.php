@include('micrositio.partials.header')

<br>

<!-- -------------------------- -->

<div class="container mx-auto p-4">

    <center><h3 class="text-3xl font-bold dark:text-purple-600">Protocolo para la prevención, atención y sanción del hostigamiento y acoso sexual</h3></center>

</div>

<div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="col-span-1">
        <p class="mb-3 text-gray-500 dark:text-black">El "Protocolo para la Prevención, Atención y Sanción del Hostigamiento y Acoso Sexual" es un conjunto de directrices y procedimientos diseñados para prevenir, identificar y abordar de manera efectiva los casos de hostigamiento y acoso sexual en un entorno determinado, como una organización, institución o comunidad. Su objetivo principal es garantizar un ambiente seguro y respetuoso para todos los individuos.</p>        
        
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-purple-500">Objetivos del Protocolo</h2>
        
        <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-black">
        <li>
        <strong>Prevención</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li><strong>Concienciación</strong>: Promover la educación y formación sobre qué constituye el hostigamiento y el acoso sexual, y cómo se puede prevenir.</li>
                <li><strong>Políticas Claras</strong>: Establecer normas y políticas claras que definan comportamientos inaceptables y fomenten un entorno libre de violencia y discriminación.</li>
            </ul>
        </li>
        <li>
        <strong>Atención</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li><strong>Procedimientos de Denuncia</strong>: Proporcionar un proceso accesible y confidencial para que las personas puedan denunciar incidentes de hostigamiento y acoso sexual sin temor a represalias.</li>
                <li><strong>Apoyo y Asesoramiento</strong>: Ofrecer apoyo emocional y recursos a las víctimas, incluyendo servicios de asesoramiento y acompañamiento durante el proceso de denuncia.</li>
            </ul>
        </li>
        <li>
        <strong>Sanción</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li><strong>Investigación</strong>: Implementar un procedimiento justo y exhaustivo para investigar las denuncias de hostigamiento y acoso sexual.</li>
                <li><strong>Acciones Correctivas</strong>: Aplicar medidas disciplinarias y correctivas apropiadas contra los responsables, que pueden incluir desde advertencias hasta sanciones más severas, dependiendo de la gravedad del caso.</li>
            </ul>
        </li>
        </ol>




    </div>

    <div class="col-span-1">
        <iframe src="{{ asset('storage/protocolo.pdf') }}" width="100%" height="600px">
            Este navegador no soporta PDFs. Por favor descarga el PDF para verlo: 
            <a href="{{ asset('storage/protocolo.pdf') }}">Descargar PDF</a>.
        </iframe>
    </div>

</div>

<!-- -------------------------- -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>