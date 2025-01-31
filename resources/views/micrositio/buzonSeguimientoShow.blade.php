@include('micrositio.partials.header')

    <div class="container">

        <center><h1 class="display-8 fw-bold text-black mt-3">Resultados de la Búsqueda SSC/HAS/{{ $denuncia->folio }}</h1></center>
        
        <div class="row">
            <div class="col-md-6">
                
                <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
                    <div class="container-fluid py-8">

                        <p>A continuación se enlistan todos los seguimientos que se le han dado a la denuncia realizada. Los registros están ordenados de acuerdo con la fecha de creación, mostrando primero los más recientes.</p>

                        <p>Si, lamentablemente, has sido víctima de una reincidencia relacionada con esta denuncia, te pedimos que la reportes a través del siguiente enlace.</p>

                        <center><a href="{{ route('buzonReincidencia') }}" class="btn btn-purple">PRESENTAR REINCIDENCIA</a></center>
                    
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">

                

                        <table class="table table-striped">
                            <thead >
                                <tr>
                                    <th scope="col">
                                        Seguimiento
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($seguimientos as $seguimiento)
                                    <tr>
                                        <td>{{ $seguimiento->mensaje }}</td>
                                        <td>{{ $seguimiento->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">No hay seguimientos registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                                            
                            
                    
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

