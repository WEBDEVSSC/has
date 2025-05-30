@include('micrositio.partials.header')

    <div class="container">

        <center><h1 class="display-8 fw-bold text-black mt-3">Seguimiento de denuncia</h1></center>
        
        <div class="row">
            <div class="col-md-6">
                
                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        <p>Queremos informarle sobre el seguimiento de su denuncia realizada a través de nuestro sistema. El seguimiento de una denuncia incluye todas las acciones que ha tomado nuestra dependencia para abordar el caso que usted ha reportado.</p>

                            <p><strong>¿Qué implica el seguimiento de su denuncia?</strong></p>

                            <ol>
                                <li><strong>Revisión del Caso:</strong> Una vez recibida su denuncia, nuestros especialistas revisan toda la información proporcionada para entender el contexto y los detalles del incidente.</li>
                                <li><strong>Investigación:</strong> Se lleva a cabo una investigación exhaustiva del caso. Esto puede incluir la recopilación de pruebas, entrevistas con personas involucradas y la evaluación de la información disponible.</li>
                                <li><strong>Acciones Tomadas:</strong> Se registran y documentan todas las acciones tomadas en respuesta a su denuncia. Esto puede incluir medidas correctivas, sanciones o cualquier otra acción relevante para resolver el caso.</li>
                                <li><strong>Comunicación:</strong> Mantendremos una comunicación continua con usted para informarle sobre el progreso del caso y cualquier decisión importante que se tome. Es fundamental que esté al tanto de las etapas del proceso y de las acciones que se han realizado.</li>
                                <li><strong>Resolución:</strong> Al finalizar la investigación, le proporcionaremos un informe detallado sobre los resultados y las decisiones tomadas. Nuestro objetivo es asegurar que su denuncia se haya manejado de manera justa y adecuada</li>
                            </ol>

                            <p>Agradecemos su paciencia y colaboración en este proceso. Si tiene alguna pregunta adicional o necesita más información, no dude en ponerse en contacto con nosotros.</p>
                    
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">

                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        <form action="{{ route('buzonSeguimientoShow') }}" method="POST">

                            @csrf
                        
                            <div class="col">
                                <div class="mb-5">
                                    <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Para dar seguimiento a su denuncia, es necesario ingresar el número de folio asignado al momento del registro inicial.</label>
                                    <label for="folio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Ingresa únicamente el número de tu folio. Por ejemplo, si tu folio es SSC/HAS/2025/000000, debes capturar solo '000000'.</label>
                                    <input type="number" id="folio" name="folio" value="{{ old('folio') }}" required class="form-control" placeholder="000000" required maxlength="6"/>
                                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                                    @error('folio')
                                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ---------------------------------- -->

                            <div class="row mt-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">

                                <center>
                                <div>
                                <img src="{{ captcha_src('flat') }}" onclick="this.src='{{ captcha_src('flat') }}'+Math.random()" style="cursor:pointer;">
                                @error('denuncia_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror 
                                <br>
                                <small>Clic sobre la imagen para recargarla</small>
                                </div>
                                </center>

                                <br>

                                <input type="text" name="captcha" class="form-control" placeholder="CAPTURE CÓDIGO">

                                @error('captcha')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4"></div>
                            </div>

                            <!-- ---------------------------------- -->
                        
                            <div class="row mt-3">
                                <div class="mb-2">
                                    <center><button type="submit" class="btn btn-purple">CONSULTAR SEGUIMIENTO</button></center> 
                                </div>
                            </div>
                            </div>
                        
                        </div>
                            
                            </form>
                        
                            
                    </div>
                </div>

            </div>
        </div>

        

    </div><!-- CONTAINER -->

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

            <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6k3I4F+VppvIEnq0u5tkU7l1RZm5SaaPqC+78LUeF9v/8gV56N4FJP" crossorigin="anonymous"></script>

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Incluye Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Incluye jQuery y Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>-->


    <!-- ----------------------------------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <!-- -- -->
  </body>
</html>

