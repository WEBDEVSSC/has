@include('micrositio.partials.header')

    <div class="container">

        <center><h1 class="display-8 fw-bold text-black mt-3">Reincidencia de denuncia SSC/HAS/2025/{{ $denuncia->folio}}</h1></center>
        
        <div class="row">
           
            <div class="col-md-12">

                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        
                        
                            <div class="col">
                                <div class="mb-5">
                                    <p>Descripción del evento.</p>
                                    
                                    <form action="{{ route('buzonReincidenciaStore') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id_denuncia" id="id_denuncia" value={{ $denuncia->id }}>
                                    <input type="hidden" name="folio" id="folio" value={{ $denuncia->folio }}>
                                    
                                    <textarea name="descripcion" id="descripcion" rows="10" class="form-control"></textarea>
                                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                                    @error('descripcion')
                                        <p><strong><div class="text-danger">{{ $message }}</div></strong></p>
                                    @enderror

                                    <p>En caso de tener alguna prueba, favor de anexarla</p>
                                    <input type="file" name="archivo" id="archivo" class="form-contro-input">
                                    @error('archivo')
                                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col">
                                <div class="mb-2">
                                    <center><button type="submit" class="btn btn-purple">REGISTRAR REINCIDENCIA</button></center> 
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

