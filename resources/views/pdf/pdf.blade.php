<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>

    <style>
        @page{
            margin: 3cm 0.5cm 1.5cm 0.5cm;
        }
        #header{
            position: fixed;
            top: -4cm;
            left: 0cm;
        }
        .imgHeader{
            float: left;
            width: 3cm;
        }
        .infoHeader{
            float: left;
            margin-left: 1cm;
        }
        #footer{
            position: fixed;
            bottom: -1.5cm;
            left: 0cm;
            width: 100%;
            background-color: red;
        }
        .textFooter{
            text-align: center;
            width: 100%;
        }
        .hijo{
            width: 2cm;
            height: 1cm;
            margin: 0.2cm;
            background-color: yellow;
        }
    </style>
</head>
<body>
    <!-- ----------------------------------------------------- -->
    <div id="header">
        <img class="imgHeader" src="{{ public_path('img/Laravel.png') }}" alt="" style="width: 200px; height: auto;">
        <div class="infoHeader">
            <h1>Titulo de laravel</h1>
            <p>Un framework para PHP MVC</p>
        </div>
    </div>
    <!-- ----------------------------------------------------- -->
    <div id="footer">
        <p class="textFooter">laravel.com</p>
    </div>
    <!-- ----------------------------------------------------- -->
    <div class="container">
        @for ($i=0; $i<50; $i++)
            <div class="hijo">{{ $i; }}</div>
        @endfor
    </div>
</body>
</html>