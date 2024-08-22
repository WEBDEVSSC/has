@include('micrositio.partials.header')

<br>

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Resultados de la Búsqueda SSC/HAS/{{ $denuncia->folio }}</h3></center>
</div>

<div class="container mx-auto p-4">
<p class="text-black dark:text-black">
    A continuación se enlistan todos los seguimientos que se le han dado a la denuncia realizada. Los registros están ordenados de acuerdo con la fecha de creación, mostrando primero los más recientes.
</p>
<br>

<p class="text-black dark:text-black">
    Si, lamentablemente, has sido víctima de una reincidencia relacionada con esta denuncia, te pedimos que la reportes a través del siguiente enlace.
</p>

<br>

<a href="{{ route('buzonReincidencia') }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">PRESENTAR REINCIDENCIA</a>
<br>
<br>

    <div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-black dark:text-black">
        <thead class="text-xs text-white uppercase bg-purple-700 dark:bg-purple-700 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Seguimiento
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($seguimientos as $seguimiento)
                <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $seguimiento->mensaje }}</td>
                    <td class="px-6 py-4">{{ $seguimiento->created_at->format('d/m/Y H:i') }}</td>
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


    




<!-- -------------------------- -->

</body>
</html>