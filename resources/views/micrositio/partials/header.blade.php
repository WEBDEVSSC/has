<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>H.A.S. Coahuila</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <!-- Select2 Bootstrap Theme -->
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet">

    <style>
        :root{
            --primary:#7836CD;
            --primary-dark:#5b2ca3;
            --primary-light:#9F71CC;
        }

        body{
            background-color:#f8f9fa;
        }

        .navbar-custom{
            background: linear-gradient(
                135deg,
                var(--primary) 0%,
                var(--primary-dark) 100%
            );
            box-shadow: 0 4px 20px rgba(0,0,0,.15);
            padding-top: .8rem;
            padding-bottom: .8rem;
        }

        .navbar-brand{
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand img{
            height: 50px;
            width: auto;
            margin-right: 12px;
        }

        .navbar-brand span{
            line-height: 1.2;
        }

        .navbar-custom .nav-link{
            color: rgba(255,255,255,.95) !important;
            font-weight: 500;
            padding: .7rem 1rem !important;
            border-radius: 10px;
            transition: all .3s ease;
        }

        .navbar-custom .nav-link:hover{
            background: rgba(255,255,255,.15);
            color: #fff !important;
            transform: translateY(-2px);
        }

        .navbar-toggler{
            border-color: rgba(255,255,255,.4);
        }

        .navbar-toggler:focus{
            box-shadow: none;
        }

        .menu-button{
            background: #fff;
            color: var(--primary) !important;
            border-radius: 30px;
            padding: .6rem 1.3rem !important;
            font-weight: 700;
            margin-left: 10px;
        }

        .menu-button:hover{
            background: #f5f5f5 !important;
            color: var(--primary-dark) !important;
        }

        @media (max-width: 991px){

            .menu-button{
                margin-top:10px;
                margin-left:0;
                text-align:center;
            }

            .navbar-brand{
                font-size:1rem;
            }

            .navbar-brand img{
                height:40px;
            }
        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('inicio') }}">

            <!-- LOGO -->
            <img src="{{ asset('img/SS-Blanco.png') }}"
                 alt="Secretaría de Salud">

            <span>
                Hostigamiento y Acoso Sexual
            </span>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarText">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('queEs') }}">
                        ¿Qué es?
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('protocolo') }}">
                        Protocolo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pronunciamiento') }}">
                        Pronunciamiento Cero Tolerancia
                    </a>
                </li>

                

            </ul>

        </div>

    </div>
</nav>