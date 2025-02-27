@include('micrositio.partials.header')

<br>

<!-- -------------------------- -->

<div class="container mx-auto p-4">

    <center><h3 class="text-3xl font-bold dark:text-purple-600">Pronunciamiento Cero Tolerancia</h3></center>

</div>

<div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="col-span-1">
        <p class="mb-3 text-gray-500 dark:text-black">El "Pronunciamiento Cero Tolerancia" es una declaración oficial que establece una política de tolerancia cero hacia comportamientos o prácticas específicas dentro de una organización, institución, o comunidad. Este pronunciamiento se enfoca en la erradicación de conductas inaceptables, como el hostigamiento, el acoso sexual, la violencia, la corrupción o cualquier forma de discriminación.</p>        
        
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-purple-500">Objetivos Clave</h2>
        
        <ol class="space-y-4 text-gray-500 list-decimal list-inside dark:text-black">
        <li>
        <strong>Promover un Ambiente Seguro y Respetuoso</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li>La política busca asegurar que todos los miembros de la organización se sientan seguros y respetados, sin temor a ser víctimas de comportamientos inapropiados o dañinos.</li>
            </ul>
        </li>
        <li>
        <strong>Establecer Normas Claras:</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li>Define claramente qué comportamientos son inaceptables y proporciona un marco para la conducta esperada dentro de la organización o comunidad.</li>
            </ul>
        </li>
        <li>
        <strong>Garantizar Acción Inmediata:</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li>Se compromete a tomar medidas firmes y rápidas ante cualquier violación de la política, sin permitir excepciones ni tolerancia hacia las infracciones.</li>
            </ul>
        </li>
        <li>
        <strong>Fomentar la Responsabilidad y la Transparencia:</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li>Refuerza la importancia de la rendición de cuentas y la transparencia en la gestión de casos y la aplicación de sanciones.</li>
            </ul>
        </li>
        <li>
        <strong>Educación y Concienciación:</strong>
            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                <li>Promueve la educación y la formación continua para prevenir la ocurrencia de conductas inaceptables y para educar a los miembros sobre las políticas y procedimientos establecidos.</li>
            </ul>
        </li>
        </ol>




    </div>

    <div class="col-span-1">
        <iframe src="{{ asset('docs/PRONUNCIAMIENTO_12-09-2024.pdf') }}" width="100%" height="1200px">
            Este navegador no soporta PDFs. Por favor descarga el PDF para verlo: 
            <a href="{{ asset('docs/PRONUNCIAMIENTO_12-09-2024.pdf') }}">Descargar PDF</a>.
        </iframe>
    </div>

</div>

<!-- -------------------------- -->
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>