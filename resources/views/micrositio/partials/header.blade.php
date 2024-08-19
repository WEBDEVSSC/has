<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<!-- -------------------------- -->
<nav class="bg-purple-500 border-gray-200 dark:bg-purple-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{ route('inicio') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Hostigamiento y Acoso Sexual</span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="tel:5541251234" class="text-sm  text-gray-500 dark:text-white hover:underline">(844) 438-8330</a>
            <a href="#" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Secretaría de Salud de Coahuila</a>
        </div>
    </div>
</nav>
<nav class="bg-gray-50 dark:bg-purple-500">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="{{ route('protocolo') }}" class="text-gray-900 dark:text-white hover:underline">Protocolo</a>
                </li>
                <li>
                    <a href="{{ route('pronunciamiento') }}" class="text-gray-900 dark:text-white hover:underline">Pronunciamiento Cero Tolerancia</a>
                </li>
                <li>
                    <a href="{{ route('directorio') }}" class="text-gray-900 dark:text-white hover:underline">Directorio de Consejeros</a>
                </li>
                <li>
                    <a href="{{ route('buzonDenuncia') }}" class="text-gray-900 dark:text-white hover:underline">Buzón de denuncias</a>
                </li>
                <li>
                    <a href="" class="text-gray-900 dark:text-white hover:underline">Seguimiento de denuncia</a>
                </li>
                <li>
                    <a href="" class="text-gray-900 dark:text-white hover:underline">Reincidencia de denuncia</a>
                </li>
            </ul>
        </div>
    </div>
</nav>