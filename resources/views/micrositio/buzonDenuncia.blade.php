@include('micrositio.partials.header')

@section('plugins.Sweetalert2', true)

@if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif

<br>

<!-- ------------------------------------------ -->

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Buzón de denuncia</h3></center>
</div>

<div class="container mx-auto p-4">
    <div class="p-4 mb-4 text-sm text-white-800 rounded-lg bg-blue-50 dark:bg-gray-100 dark:text-black" role="alert">
        <span class="font-medium">LEYENDA DE PRIVACIDAD</span>
        <br><br>
        Aviso de privacidad del Programa de Fortalecimiento de atención y asistencia a las víctimas de delito en el sistema de salud y red de instituciones con perspectiva de género. La secretaria de Salud del Estado de Coahuila de Zaragoza, a través de su área de Ética, Normativa, OIC, Jurídica y otras. con domicilio en calle Victoria número 312 en la Zona Centro, de Saltillo, Coahuila de Zaragoza; es la responsable del tratamiento de los datos personales proporcionados por Usted, los cuales serán protegidos conforme a la Ley General de Protección de Datos Personales y la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Coahuila de Zaragoza y demás normatividad que resulte aplicable. Los datos obtenidos serán utilizados para: a) generar el recorte de casos; b) la atención de casos; c) generar estadísticas e informes necesarios y para uso de la institución recabarte. Se le informa que no se harán transferencias que requieran su consentimiento. Así mismo se le informa que tiene derecho a Acceder, Rectificar, Cancelar u Oponerse al tratamiento de los mismos, por solicitud escrita ante el área administrativa resguardante en el domicilio antes proporcionado.
    </div>
</div>

<div class="container mx-auto p-4">



<!-- ----------------------------------------------------- -->

<form action="{{ route('buzonStore') }}" method="POST"  enctype="multipart/form-data">

@csrf

<p class="font-bold dark:text-purple-600">Tipo de solicitud</p>
<br>

<div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <select name="tipo_solicitud" id="tipo_solicitud" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                <option value="" disabled {{ old('tipo_solicitud') ? '' : 'selected' }}>Selecciona una opción</option>
                <option value="ACOSO SEXUAL" {{ old('tipo_solicitud')=='ACOSO SEXUAL' }}>ACOSO SEXUAL</option>
                <option value="HOSTIGAMIENTO SEXUAL" {{ old('tipo_solicitud')=='HOSTIGAMIENTO SEXUAL' }}>HOSTIGAMIENTO SEXUAL</option>
                <option value="OTRO" {{ old('tipo_solicitud')=='OTRO' }}>OTRO</option>
            </select>
            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('tipo_solicitud')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<!-- ----------------------------------------------------- -->

<p class="font-bold dark:text-purple-600">Datos generales del/la afectado/afectada</p>
<br>
  <div class="grid grid-cols-4 gap-4">

    <div class="col">
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('nombre')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col"> 
        <div class="mb-5">
            <label for="edad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Edad <small>(Años cumplidos)</small></label>
            <input type="number" id="edad" name="edad" value="{{ old('edad') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('edad')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sexo</label>
            <select name="sexo" id="sexo" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Selecciona una opción</option>
                <option value="MASCULINO" {{ old('sexo')=='MASCULINO' }}>MASCULINO</option>
                <option value="FEMENINO" {{ old('sexo')=='FEMENINO' }}>FEMENINO</option>
            </select>
            @error('sexo')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">E-mail</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}"  class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('correo')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

  </div>

</div>

<!-- ------------------------------------------ -->

<div class="container mx-auto p-4">
  <div class="grid grid-cols-4 gap-4">

    <div class="col">
        <div class="mb-5">
            <label for="celular" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Celular</label>
            <input type="text" id="celular" name="celular" value="{{ old('celular') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="10 Digitos" required />
            @error('celular')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

  </div>
</div>

<!-- -------------------------- -->

<div class="container mx-auto p-4">
  <div class="grid grid-cols-4 gap-4">

    <div class="col">
        <div class="mb-5">
            <label for="adscripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área de adscripción</label>
            <input type="text" id="adscripcion" name="adscripcion" value="{{ old('adscripcion') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('adscripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="unidad_responsable" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Unidad responsable</label>
            <input type="text" id="unidad_responsable" name="unidad_responsable" value="{{ old('unidad_responsable') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('unidad_responsable')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="id_municipio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Municipio</label>
            <select name="id_municipio" id="id_municipio" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500"  required>
                        <option value="" selected disabled {{ old('id_municipio') ? '' : 'selected' }}>Selecciona una entidad</option>
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->id }}" {{ old('id_municipio') == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}
                            </option>
                        @endforeach
                    </select>
            @error('id_municipio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="tipo_contratacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de contratación</label>
            <select name="tipo_contratacion" id="tipo_contratacion"  class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="" disabled {{ old('tipo_contratacion') ? '' : 'selected' }}>Selecciona una opción</option>
                <option value="CONFIANZA" {{ old('tipo_contratacion') ? '' : 'CONFIANZA' }}>CONFIANZA</option>
                <option value="BASE" {{ old('tipo_contratacion') ? '' : 'BASE' }}>BASE</option>
                <option value="CONTRATO" {{ old('tipo_contratacion') ? '' : 'CONTRATO' }}>CONTRATO</option>
                <option value="EN FORMACION" {{ old('tipo_contratacion') ? '' : 'EN FORMACIÓN' }}>EN FORMACIÓN</option>
                <option value="OTRA" {{ old('tipo_contratacion') ? '' : 'OTRA' }}>OTRA</option>
            </select>
            @error('tipo_contratacion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>    

  </div>
</div>

<!-- ------------------------------------------ -->

<div class="container mx-auto p-4">
  <div class="grid grid-cols-4 gap-4">

    <div class="col">
        <div class="mb-5">
            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cargo</label>
            <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('cargo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col"> 
    <div class="mb-5">
        <label for="vulnerabilidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Situación de vulnerabilidad</label>
        <select id="vulnerabilidad" name="vulnerabilidad" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
            <option value="" disabled {{ old('vulnerabilidad') ? '' : 'selected' }}>Selecciona un tipo</option>
            <option value="SI" {{ old('vulnerabilidad') == 'SI' ? 'selected' : '' }}>SI</option>
            <option value="NO" {{ old('vulnerabilidad') == 'NO' ? 'selected' : '' }}>NO</option>
        </select>
        @error('vulnerabilidad')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col">
    <div class="mb-5">
        <label for="cual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cuál</label>
        <select id="cual" name="cual" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">
            <option value="" disabled {{ old('cual') ? '' : 'selected' }}>Selecciona un tipo</option>
            <option value="PERSONAS MIGRANTES" {{ old('cual') == 'PERSONAS MIGRANTES' ? 'selected' : '' }}>PERSONAS MIGRANTES</option>
            <option value="PERSONAS CON DISCAPACIDAD" {{ old('cual') == 'PERSONAS CON DISCAPACIDAD' ? 'selected' : '' }}>PERSONAS CON DISCAPACIDAD</option>
            <option value="POBLACION INDIGENA" {{ old('cual') == 'POBLACION INDIGENA' ? 'selected' : '' }}>POBLACION INDIGENA</option>
            <option value="OTRA SITUACION" {{ old('cual') == 'OTRA SITUACION' ? 'selected' : '' }}>OTRA SITUACION</option>
            <option value="DOS O MAS SITUACIONES" {{ old('cual') == 'DOS O MAS SITUACIONES' ? 'selected' : '' }}>DOS O MAS SITUACIONES</option>
        </select>
        <!-- MOSTRAR EL ERROR SI EXISTE -->
        @error('cual')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

    
  </div>

  <p class="font-bold dark:text-purple-600">Datos del/la denunciado/denunciada</p>
  <br>

<div class="grid grid-cols-4 gap-4">

    <div class="col">

        <div class="mb-5">
            <label for="denunciado_nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre completo</label>
            <input type="text" id="denunciado_nombre" name="denunciado_nombre" value="{{ old('denunciado_nombre') }}" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('denunciado_nombre')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="col">

        <div class="mb-5">
            <label for="denunciado_cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cargo</label>
            <input type="text" id="denunciado_cargo" name="denunciado_cargo" value="{{ old('denunciado_cargo') }}"  class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('denunciado_cargo')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="col">

        <div class="mb-5">
            <label for="denunciado_puesto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Puesto</label>
            <select name="denunciado_puesto" id="denunciado_puesto" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >   
                <option value="" disabled {{ old('denunciado_puesto') ? '' : 'selected' }}>Selecciona una opción</option>
                <option value="HOMOLOGO" {{ old('denunciado_puesto') == 'HOMOLOGO' ? 'selected' : '' }}>HOMOLOGO</option>
                <option value="SUPERIOR" {{ old('denunciado_puesto') == 'SUPERIOR' ? 'selected' : '' }}>SUPERIOR</option>
            </select>
            @error('denunciado_puesto')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

    </div>

    </div>

    <div class="grid grid-cols-1 gap-1">

        <div class="col">
            <div class="mb-5">
                <label for="denunciado_antecedentes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cuenta con antecedentes</label>
                <textarea name="denunciado_antecedentes" id="denunciado_antecedentes" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('denunciado_antecedentes') }}</textarea>
                @error('denunciado_antecedentes')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>

    <p class="font-bold dark:text-purple-600">Hechos (Favor de ser breve en la descripción del evento)</p>
    <br>

  <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="como" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Cómo sucedierón?</label>
            <textarea name="como" id="como" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('como') }}</textarea>
            @error('como')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="cuando" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Cuándo sucedierón?</label>
            <textarea name="cuando" id="cuando" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('cuando') }}</textarea>
            @error('cuando')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="donde" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Dónde sucedierón?</label>
            <textarea name="donde" id="donde" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('donde') }}</textarea>
            @error('donde')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="testigos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Testigos <small>Nombres, cargos y teléfonos, especificar si están dispuestos a sustentar lo dicho en escrito</small></label>
            <textarea name="testigos" id="testigos" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500">{{ old('testigos') }}</textarea>
            @error('testigos')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <p class="font-bold dark:text-purple-600">Evidencia digital</p>
    <br>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
    <div class="mb-5">
        <label for="evidencia_uno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Evidencia 1</label>
        <input 
            id="evidencia_uno" 
            name="evidencia_uno" 
            type="file" 
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >
        <p class="mt-1 text-sm text-gray-500 dark:text-black">JPG, JPEG, PNG, DOC, PDF, TXT (MAX. 10 MB).</p>
        @error('evidencia_uno')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col">
    <div class="mb-5">
        <label for="evidencia_dos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Evidencia 2</label>
        <input 
            id="evidencia_dos" 
            name="evidencia_dos" 
            type="file" 
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        >
        <p class="mt-1 text-sm text-gray-500 dark:text-black">JPG, JPEG, PNG, DOC, PDF, TXT (MAX. 10 MB).</p>
        @error('evidencia_dos')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>


    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">REGISTRAR DENUNCIA</button>
        </div>
    </div>
    </div>

</div>

<!-- ------------------------------------------ -->



<!-- ------------------------------------------ -->
</form>
</div>

<!-- ------------------------------------------ -->


</body>
</html>