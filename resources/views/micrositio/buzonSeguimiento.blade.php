@include('micrositio.partials.header')

@section('plugins.Sweetalert2', true)

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        });
    </script>
@endif

<br>

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Seguimiento de denuncia</h3></center>
</div>

<div class="container mx-auto p-4">
  
    <section class="bg-white dark:bg-gray-100">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">

        <p>Queremos informarle sobre el seguimiento de su denuncia realizada a través de nuestro sistema. El seguimiento de una denuncia incluye todas las acciones que ha tomado nuestra dependencia para abordar el caso que usted ha reportado.</p>
        
        <br>

        <p><strong>¿Qué implica el seguimiento de su denuncia?</strong></p>

        <br>

        <ol>
            <li><strong>Revisión del Caso:</strong> Una vez recibida su denuncia, nuestros especialistas revisan toda la información proporcionada para entender el contexto y los detalles del incidente.</li>
            <li><strong>Investigación:</strong> Se lleva a cabo una investigación exhaustiva del caso. Esto puede incluir la recopilación de pruebas, entrevistas con personas involucradas y la evaluación de la información disponible.</li>
            <li><strong>Acciones Tomadas:</strong> Se registran y documentan todas las acciones tomadas en respuesta a su denuncia. Esto puede incluir medidas correctivas, sanciones o cualquier otra acción relevante para resolver el caso.</li>
            <li><strong>Comunicación:</strong> Mantendremos una comunicación continua con usted para informarle sobre el progreso del caso y cualquier decisión importante que se tome. Es fundamental que esté al tanto de las etapas del proceso y de las acciones que se han realizado.</li>
            <li><strong>Resolución:</strong> Al finalizar la investigación, le proporcionaremos un informe detallado sobre los resultados y las decisiones tomadas. Nuestro objetivo es asegurar que su denuncia se haya manejado de manera justa y adecuada</li>
        </ol>
    
        <br>

        <p>Agradecemos su paciencia y colaboración en este proceso. Si tiene alguna pregunta adicional o necesita más información, no dude en ponerse en contacto con nosotros.</p>

        </div>
    </section>
  
</div>

<div class="container mx-auto p-4">

<form action="{{ route('buzonSeguimientoShow') }}" method="POST">

    @csrf

    <div class="col">
        <div class="mb-5">
            <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Para dar seguimiento a su denuncia, es necesario ingresar el número de folio asignado al momento del registro inicial.</label>
            <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresa únicamente el número de tu folio. Por ejemplo, si tu folio es SSC/HAS/0000, debes capturar solo '0000'.</label>
            <input type="number" id="folio" name="folio" value="{{ old('folio') }}" required class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="0000" required />
            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('folio')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">CONSULTAR SEGUIMIENTO</button>
        </div>
    </div>
    </div>

</div>
    
    </form>

</div><!-- ---------------------------- container mx-auto p-4 -->

<!-- -------------------------- -->

</body>
</html>