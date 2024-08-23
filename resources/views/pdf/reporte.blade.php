<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #333;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            border-top: 1px solid black;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="content">

    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;">
                <h4>Servicios de Salud de Coahuila de Zaragoza</h4>
            </td>
            <td style="text-align: right;">
                <h4>Hostigamiento y Acoso Sexual</h4>
            </td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; background-color: #e5e7e9;"><strong>Datos Generales</strong></td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Folio</strong></td>
            <td style="border: 1px solid black;"><strong>Status</strong></td>
            <td style="border: 1px solid black;"><strong>Fecha de registro</strong></td>
            <td style="border: 1px solid black;"><strong>Nombre</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">SSC/HAS/{{ $denuncia->folio }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->status }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->created_at }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->nombre }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><strong>Edad</strong></td>
            <td style="border: 1px solid black;"><strong>Sexo</strong></td>
            <td style="border: 1px solid black;"><strong>Correo</strong></td>
            <td style="border: 1px solid black;"><strong>Contacto</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->edad }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->sexo }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->correo }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->celular }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; background-color: #e5e7e9;"><strong>Adscripción</strong></td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Area</strong></td>
            <td style="border: 1px solid black;"><strong>Unidad responsable</strong></td>
            <td style="border: 1px solid black;"><strong>Municipio</strong></td>
            <td style="border: 1px solid black;"><strong>Tipo de contratación</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->adscripcion }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->unidad_resposable }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->municipio }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->tipo_contratacion }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Cargo</strong></td>
            <td style="border: 1px solid black;"><strong>Situación de vulnerabilidad</strong></td>
            <td style="border: 1px solid black;"><strong>Cual</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->cargo }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->vulnerabilidad }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->cual }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; background-color: #e5e7e9;"><strong>Datos del denunciado</strong></td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Nombre completo</strong></td>
            <td style="border: 1px solid black;"><strong>Cargo</strong></td>
            <td style="border: 1px solid black;"><strong>Puesto</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->denunciado_nombre }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->denunciado_cargo }}</td>
            <td style="border: 1px solid black;">{{ $denuncia->denunciado_puesto }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Antecedentes</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->denunciado_antecedentes }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black; background-color: #e5e7e9;"><strong>Hechos</strong></td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Como</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->como }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Cuando</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->cuando }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Donde</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->donde }}</td>
        </tr>
    </table>

    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="border: 1px solid black;"><strong>Testigos</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">{{ $denuncia->testigos }}</td>
        </tr>
    </table>


    </div><!-- DIV CONTENT -->

    <div class="footer">
        <p>© {{ date('Y') }} - Secretaría de Salud de Coahuila. Todos los derechos reservados.</p>
    </div>
     
</body>
</html>
