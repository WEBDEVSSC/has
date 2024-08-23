<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .content {
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>{{ $titulo }}</h1>
        <p>{{ $contenido }}</p>
    </div>
</body>
</html>
