@include('micrositio.partials.header')

    <div class="container">

        <center><h1 class="display-8 fw-bold text-black mt-3">Reincidencia de denuncia</h1></center>
        
        <div class="row">
            <div class="col-md-6">
                
                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        <p>Queremos informarle sobre el proceso de seguimiento relacionado con la reincidencia de su denuncia presentada previamente a través de nuestro sistema. En casos de reincidencia, es fundamental revisar cada reporte adicional para garantizar una intervención efectiva y adecuada.</p>


                        <p><strong>¿Qué implica el seguimiento de la reincidencia en su denuncia?</strong></p>

                        <ol>
                            <li><strong>Reevaluación del Caso:</strong> Nuestros especialistas revisan no solo la nueva denuncia, sino también el historial previo asociado al folio original para entender mejor el patrón de incidentes y las circunstancias actuales.</li>
                            <li><strong>Investigación Ampliada:</strong> Se realiza una investigación más exhaustiva, considerando tanto la nueva información como cualquier prueba o testimonio previo. Este proceso incluye entrevistas adicionales y una evaluación más detallada de los hechos.</li>
                            <li><strong>Acciones Complementarias:</strong> Documentamos todas las medidas adicionales que se tomen en respuesta a la reincidencia. Estas acciones pueden incluir la aplicación de sanciones más estrictas, el fortalecimiento de medidas preventivas o cualquier otra intervención necesaria..</li>
                            <li><strong>Comunicación Continua:</strong> Le mantendremos informado sobre cada etapa de este nuevo proceso. Es vital que esté al tanto de las decisiones y medidas adicionales que se adopten en relación con la reincidencia.</li>
                            <li><strong>Resolución y Revisión:</strong> Al concluir el seguimiento, le proporcionaremos un informe actualizado con los resultados y las nuevas acciones determinadas. Nuestra meta es asegurar una respuesta justa y efectiva a la reincidencia en su denuncia.</li>
                        </ol>
                

                        <p>Agradecemos su confianza y colaboración. Si tiene alguna pregunta adicional o necesita más información, no dude en ponerse en contacto con nosotros.</p>

                    
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">

                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        
                        
                            <div class="col">
                                <div class="mb-5">
                                    <p>Para presentar una reincidencia, es necesario ingresar el número de folio asignado al momento del registro inicial</p>
                                    <p>Ingresa únicamente el número de tu folio. Por ejemplo, si tu folio es SSC/HAS/2025/000000, debes capturar solo '000000'.</p>
                                    
                                    <form action="{{ route('buzonReincidenciaCreate') }}" method="POST">

                                    @csrf
                                    
                                    <input type="number" id="folio" name="folio" value="{{ old('folio') }}" class="form-control" placeholder="000000" required maxlength="6"/>
                                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                                    @error('folio')
                                        <p><strong><div class="text-danger">{{ $message }}</div></strong></p>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col">
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

    @if(session('reincidencia'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Exito',
                text: "{{ session('reincidencia') }}",
                icon: 'success',
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

