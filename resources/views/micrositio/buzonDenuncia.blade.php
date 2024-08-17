@include('micrositio.partials.header')

<br>

<!-- ------------------------------------------ -->

<div class="container mx-auto p-4">
    <center><h3 class="text-3xl font-bold dark:text-purple-600">Buzón de denuncia</h3></center>
</div>

<div class="container mx-auto p-4">
    <div class="p-4 mb-4 text-sm text-white-800 rounded-lg bg-blue-50 dark:bg-gray-100 dark:text-black" role="alert">
        <span class="font-medium">LEYENDA DE PRIVACIDAD</span><br><br>Aviso de privacidad del Programa de Fortalecimiento de atención y asistencia a las víctimas de delito en el sistema de salud y red de instituciones con perspectiva de género. La secretaria de Salud del Estado de Coahuila de Zaragoza, a través de su área de Ética, Normativa, OIC, Jurídica y otras. con domicilio en calle Victoria número 312 en la Zona Centro, de Saltillo, Coahuila de Zaragoza; es la responsable del tratamiento de los datos personales proporcionados por Usted, los cuales serán protegidos conforme a la Ley General de Protección de Datos Personales y la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Coahuila de Zaragoza y demás normatividad que resulte aplicable. Los datos obtenidos serán utilizados para: a) generar el recorte de casos; b) la atención de casos; c) generar estadísticas e informes necesarios y para uso de la institución recabarte. Se le informa que no se harán transferencias que requieran su consentimiento. Así mismo se le informa que tiene derecho a Acceder, Rectificar, Cancelar u Oponerse al tratamiento de los mismos, por solicitud escrita ante el área administrativa resguardante en el domicilio antes proporcionado.
    </div>
</div>

<div class="container mx-auto p-4">

<!-- ----------------------------------------------------- -->

<form action="">

<p class="font-bold dark:text-purple-600">Tipo de solicitud</p>
<br>

<div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <select name="tipo_solicitud" id="tipo_solicitud" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="ACOSO SEXUAL">ACOSO SEXUAL</option>
                <option value="HOSTIGAMIENTO SEXUAL">HOSTIGAMIENTO SEXUAL</option>
                <option value="OTRO">OTRO</option>
            </select>
            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('tipo_solicitud')
                <div class="alert alert-danger">{{ $message }}</div>
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
            <input type="text" id="nombre" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col"> 
        <div class="mb-5">
            <label for="edad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Edad <small>(Años cumplidos)</small></label>
            <input type="text" id="edad" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('edad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="sexo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Sexo</label>
            <select name="sexo" id="sexo" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>
            @error('sexo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">E-mail</label>
            <input type="email" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('email')
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
            <label for="celular" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Celular</label>
            <input type="text" id="celular" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="10 Digitos" required />
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
            <label for="area_adscripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Área de adscripción</label>
            <input type="text" id="area_adscripcion" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('area_adscripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="mb-5">
            <label for="unidad_responsable" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Unidad responsable</label>
            <input type="text" id="unidad_responsable" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
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
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tipo de contratación</label>
            <select name="sexo" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="" selected disabled>Selecciona una opción</option>
                <option value="CONFIANZA">CONFIANZA</option>
                <option value="BASE">BASE</option>
                <option value="CONTRATO">CONTRATO</option>
                <option value="EN FORMACIÓN">EN FORMACIÓN</option>
                <option value="OTRA">OTRA</option>
            </select>
            @error('nombre')
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
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cargo</label>
            <input type="email" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col"> 
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Situación de vulnerabilidad</label>
            <select name="sexo" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="">Selecciona una opción</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cual</label>
            <select name="sexo" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="">Selecciona una opción</option>
                <option value="PERSONAS MIGRANTE">PERSONAS MIGRANTE</option>
                <option value="PERSONAS CON DISCAPACIDAD">PERSONAS CON DISCAPACIDAD</option>
                <option value="POBLACIÓN INDIGENA">POBLACIÓN INDIGENA</option>
                <option value="OTRA SITUACION">OTRA SITUACIÓN</option>
                <option value="DOS O MAS SITUACIONES">DOS O MÁS SITUACIONES</option>
            </select>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
  </div>

  <p class="font-bold dark:text-purple-600">Datos del/la denunciado/denunciada</p>
  <br>

<div class="grid grid-cols-4 gap-4">

    <div class="col">

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nombre completo</label>
            <input type="email" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="col">

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cargo</label>
            <input type="email" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" required />
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="col">

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Puesto</label>
            <select name="sexo" id="email" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" >
                <option value="">Selecciona una opción</option>
                <option value="HOMOLOGO">HOMOLOGO</option>
                <option value="SUPERIOR">SUPERIOR</option>
            </select>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cuenta con antecedentes</label>
            <textarea name="" id="" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" ></textarea>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <p class="font-bold dark:text-purple-600">Hechos (Favor de ser breve en la descripción del evento)</p>
    <br>

  <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Cómo sucedierón?</label>
            <textarea name="" id="" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" ></textarea>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Cuándo sucedierón?</label>
            <textarea name="" id="" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" ></textarea>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">¿Dónde sucedierón?</label>
            <textarea name="" id="" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" ></textarea>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Testigos <small>Nombres, cargos y teléfonos, especificar si están dispuestos a sustentar lo dicho en escrito</small></label>
            <textarea name="" id="" rows="5" class="bg-white border border-white text-black text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-white dark:border-purple-600 dark:placeholder-purple-400 dark:text-black dark:focus:ring-purple-500 dark:focus:border-purple-500" ></textarea>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    </div>

    <p class="font-bold dark:text-purple-600">Evidencia digital</p>
    <br>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="file_input">Evidencia 1</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-black" id="file_input_help">JPE, JPEG, PNG, DOC, PDF, TXT (MAX. 5MB).</p>
        </div>
    </div>
    </div>

    <div class="grid grid-cols-1 gap-1">

    <div class="col">
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="file_input">Evidencia 2</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-black" id="file_input_help">JPE, JPEG, PNG, DOC, PDF, TXT (MAX. 5MB).</p>
        </div>
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