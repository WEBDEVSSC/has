<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H.A.S. Coah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <style>
    .navbar-custom {
        background-color: #7836CD; /* Color verde personalizado */
    }
    .text-purple {
        color: #6f42c1; /* Un tono morado */
    }
    .btn-purple {
        background-color: #7836CD; /* Un tono morado */
        border-color: #7836CD;
        color: white;
    }

    .btn-purple:hover {
        background-color: #9F71CC; /* Un tono más oscuro para el hover */
        border-color: #9F71CC;
        color: white;
    }
  </style>

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Select2 Bootstrap 4 Theme -->
  <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />


  <body>
    <!-- ----------------------------------------------- -->

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{ route('inicio') }}"><strong>Hostigamiento y Acoso Sexual</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('queEs') }}">¿Qué es?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('protocolo') }}">Protocolo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pronunciamiento') }}">Pronunciamiento Cero Tolerancia</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>