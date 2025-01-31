@include('micrositio.partials.header')

    <div class="container">

        <div class="p-5 mb-4 bg-body-tertiary rounded-3 mt-3">
            <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-black">¡Bienvenido al Portal de Denuncias de Hostigamiento y Acoso Sexual de la Secretaría de Salud de Coahuila!</h1>

            <p class="text-black">En este espacio seguro y confidencial, estamos comprometidos a escuchar y apoyar a todas las personas que han sido víctimas de hostigamiento o acoso sexual.</p> 
            <p class="text-black">Sabemos lo difícil que puede ser dar este paso, y queremos que sepas que no estás solo.</p>
            <p class="text-black">Nuestra prioridad es brindarte la atención y el respaldo que mereces, siempre con el respeto y la dignidad que cada persona merece.</p>
            <p class="text-black">Tu bienestar es lo más importante para nosotros. No dudes en presentar tu denuncia; estamos aquí para ayudarte.</p>
            <p class="text-black">Gracias por tu confianza</p>

            <div class="row">
                <div class="card-group">
                    <div class="card">
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">PRESENTAR DENUNCIA</h5>
                        <p class="card-text">Presentar una denuncia es un paso importante para garantizar la seguridad y el bienestar de las personas. En nuestra plataforma, te ofrecemos un espacio seguro y confidencial para que puedas reportar cualquier acto de acoso sexual.</p>
                      </div>
                      <div class="card-footer">
                        <a href="{{ route('formatoDenuncia')}}"><small class="text-body-secondary">Ver formato</small></a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">SEGUIMIENTO</h5>
                        <p class="card-text">A través de nuestra plataforma, podrás estar informado sobre el progreso de tu caso, recibir actualizaciones y saber que tu denuncia está siendo tratada con la seriedad y urgencia que merece</p>
                      </div>
                      <div class="card-footer">
                        <a href="{{ route('buzonSeguimiento') }}"><small class="text-body-secondary">Ver formato</small></a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">REINCIDENCIA</h5>
                        <p class="card-text">La reincidencia de un caso de acoso o hostigamiento es una grave situación que debe ser abordada con urgencia.</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-body-secondary">Ver formato</small>
                      </div>
                    </div>
                  </div>
            </div>

            </div>
          </div>

    </div><!-- CONTAINER -->

    <!-- ----------------------------------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <!-- -- -->
  </body>
</html>

