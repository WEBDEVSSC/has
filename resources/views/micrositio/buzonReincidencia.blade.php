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

@if(session('reincidencia'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success',
                text: "{{ session('reincidencia') }}",
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        });
    </script>
@endif

<br>

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Reincidencia de denuncia</h3></center>
</div>

<div class="container mx-auto p-4">
  
    <section class="bg-white dark:bg-gray-100">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">

        <p>Queremos informarle sobre el proceso de seguimiento relacionado con la reincidencia de su denuncia presentada previamente a través de nuestro sistema. En casos de reincidencia, es fundamental revisar cada reporte adicional para garantizar una intervención efectiva y adecuada.</p>
        
        <br>

        <p><strong>¿Qué implica el seguimiento de la reincidencia en su denuncia?</strong></p>

        <br>

        <ol>
            <li><strong>Reevaluación del Caso:</strong> Nuestros especialistas revisan no solo la nueva denuncia, sino también el historial previo asociado al folio original para entender mejor el patrón de incidentes y las circunstancias actuales.</li>
            <li><strong>Investigación Ampliada:</strong> Se realiza una investigación más exhaustiva, considerando tanto la nueva información como cualquier prueba o testimonio previo. Este proceso incluye entrevistas adicionales y una evaluación más detallada de los hechos.</li>
            <li><strong>Acciones Complementarias:</strong> Documentamos todas las medidas adicionales que se tomen en respuesta a la reincidencia. Estas acciones pueden incluir la aplicación de sanciones más estrictas, el fortalecimiento de medidas preventivas o cualquier otra intervención necesaria..</li>
            <li><strong>Comunicación Continua:</strong> Le mantendremos informado sobre cada etapa de este nuevo proceso. Es vital que esté al tanto de las decisiones y medidas adicionales que se adopten en relación con la reincidencia.</li>
            <li><strong>Resolución y Revisión:</strong> Al concluir el seguimiento, le proporcionaremos un informe actualizado con los resultados y las nuevas acciones determinadas. Nuestra meta es asegurar una respuesta justa y efectiva a la reincidencia en su denuncia.</li>
        </ol>
    
        <br>

        <p>Agradecemos su confianza y colaboración. Si tiene alguna pregunta adicional o necesita más información, no dude en ponerse en contacto con nosotros.</p>

        </div>
    </section>
  
</div>

<div class="container mx-auto p-4">

<form action="{{ route('buzonReincidenciaCreate') }}" method="POST">

    @csrf

    <div class="col">
        <div class="mb-5">
            <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Para presentar una reincidencia, es necesario ingresar el número de folio asignado al momento del registro inicial.</label>
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
            <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">BUSCAR FOLIO</button>
        </div>
    </div>
    </div>

</div>
    
    </form>

</div><!-- ---------------------------- container mx-auto p-4 -->

<!-- -------------------------- -->

</body>
</html>