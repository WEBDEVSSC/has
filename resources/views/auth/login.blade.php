@extends('adminlte::auth.login')

@section('title', 'Iniciar Sesión')

@section('adminlte_css')
    @parent
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Fondo con degradado morado sutil estilo Material Design */
        body.login-page {
            background: linear-gradient(135deg, #2E1B4E 0%, #1F1035 50%, #150A26 100%) !important;
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            color: #1E293B;
            min-height: 100vh;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Ocultar texto residual de la marca AdminLTE */
        .login-logo {
            text-align: center !important;
            margin-bottom: 2rem !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
        }

        .login-logo a {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 0 !important;
            color: transparent !important;
            text-decoration: none !important;
            width: 100% !important;
        }

        /* Tamaño destacado del logo */
        .login-logo img, 
        .login-logo a img,
        .brand-image,
        .login-box-msg img {
            max-height: 160px !important;
            height: auto !important;
            width: auto !important;
            max-width: 90% !important;
            display: block !important;
            margin: 0 auto !important;
            filter: drop-shadow(0 6px 15px rgba(0, 0, 0, 0.4));
        }

        /* Tarjeta principal Material Design 3 */
        .card {
            border: none !important;
            border-radius: 28px !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35) !important;
            background-color: #FFFFFF !important;
            overflow: hidden;
        }

        /* Cabecera interna de la tarjeta */
        .card-header {
            background: transparent !important;
            border-bottom: none !important;
            padding: 2.25rem 2rem 0.5rem 2rem !important;
            text-align: center;
        }

        .card-title-custom {
            color: #4A148C;
            font-weight: 700;
            font-size: 1.45rem;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-card-header-subtitle {
            color: #64748B;
            font-size: 0.85rem;
            margin-top: 6px;
            margin-bottom: 0;
            font-weight: 400;
        }

        /* Cuerpo del formulario */
        .card-body {
            padding: 1.5rem 2.25rem 2.5rem 2.25rem !important;
        }

        .login-box-msg {
            display: none !important;
        }

        /* Ocultar el checkbox de 'Recordarme' y su fila */
        .icheck-primary, 
        .login-card-body .row .col-8,
        .card-body .row .col-8,
        .icheck-primary + label,
        div.icheck-primary {
            display: none !important;
        }

        /* Ajustar la columna del botón para que ocupe el 100% */
        .login-card-body .row .col-4,
        .card-body .row .col-4 {
            flex: 0 0 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
        }

        /* Contenedor de inputs */
        .input-group {
            position: relative;
            margin-bottom: 1.25rem !important;
            border-radius: 12px !important;
            background-color: #F5F0FA;
            border: 1px solid transparent;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .input-group:focus-within {
            background-color: #FFFFFF !important;
            border-color: #4A148C !important;
            box-shadow: 0 0 0 3px rgba(74, 20, 140, 0.15) !important;
        }

        .input-group-text {
            background-color: transparent !important;
            border: none !important;
            color: #7E57C2;
            padding-left: 1.25rem;
            padding-right: 0.5rem;
            transition: color 0.2s ease;
        }

        .input-group:focus-within .input-group-text {
            color: #4A148C;
        }

        .form-control {
            background-color: transparent !important;
            border: none !important;
            height: 52px !important;
            padding: 0.75rem 1rem 0.75rem 0.25rem !important;
            font-size: 0.95rem;
            color: #0F172A;
            box-shadow: none !important;
        }

        .form-control::placeholder {
            color: #958AA6;
            font-weight: 400;
        }

        /* Botón homogeneizado (mismo tamaño, altura y bordes que el input) */
        .card-body .btn,
        .btn-primary,
        .btn-info,
        .btn-block {
            background: linear-gradient(135deg, #4A148C 0%, #6A1B9A 100%) !important;
            border: none !important;
            border-radius: 12px !important; /* Mismo radio que el .input-group */
            height: 52px !important;       /* Misma altura que el .form-control */
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 1.5rem !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            letter-spacing: 0.3px;
            color: #FFFFFF !important;
            box-shadow: 0 4px 14px rgba(74, 20, 140, 0.35) !important;
            transition: all 0.2s ease-in-out !important;
            margin-top: 0.75rem !important;
            width: 100% !important;
        }

        .card-body .btn:hover,
        .btn-primary:hover,
        .btn-info:hover {
            background: linear-gradient(135deg, #380E6B 0%, #581482 100%) !important;
            box-shadow: 0 6px 18px rgba(74, 20, 140, 0.45) !important;
            transform: translateY(-1px);
        }

        /* Pie de página */
        .login-footer-text {
            text-align: center;
            margin-top: 2rem;
            color: #B39DDB;
            font-size: 0.75rem;
            letter-spacing: 0.2px;
        }
    </style>
@stop

@section('auth_header')
    <div class="card-title-custom">
        <i class="fas fa-shield-alt"></i>
        <span>Sistema Denuncias</span>
    </div>
    <p class="login-card-header-subtitle">Servicios de Salud de Coahuila de Zaragoza</p>
@stop

@section('auth_footer')
    <div class="login-footer-text">
        © {{ now()->year }} Todos los derechos reservados
    </div>
@stop