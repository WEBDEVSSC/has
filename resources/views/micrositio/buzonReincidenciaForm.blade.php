@include('micrositio.partials.header')

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

<br>

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Reincidencia de denuncia SSC/HAS/{{ $folio }}</h3></center>
</div>

<div class="container mx-auto p-4">

<form action="{{ route('buzonReincidenciaStore') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="id_denuncia" value="{{ $id_denuncia }}">
    <input type="hidden" name="folio" value="{{ $folio }}">

    <div class="col">
        <div class="mb-5">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Descripción del evento.</label>
            <textarea id="descripcion" name="descripcion" rows="5" required class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('descripcion') }}</textarea>

            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('descripcion')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
    <div class="mb-5">
        <label for="archivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">En caso de tener alguna prueba, favor de anexarla</label>
        <input 
            id="archivo" 
            name="archivo" 
            type="file" 
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
        <p class="mt-1 text-sm text-gray-500 dark:text-black">JPG, JPEG, PNG, DOC, PDF, TXT (MAX. 10 MB).</p>
        @error('archivo')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">REGISTRAR REINCIDENCIA</button>
        </div>
    </div>
    </div>

</div>
    
    </form>

</div><!-- ---------------------------- container mx-auto p-4 -->

<!-- -------------------------- -->

</body>
</html>