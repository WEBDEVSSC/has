@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Hostigamiento y Acoso Sexual</h1>
@stop

@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formato de registro</h3>
    </div>
    <div class="card-body">
        
        <form action="{{ route('formulario.registra') }}" method="POST"  enctype="multipart/form-data">
        @csrf <!-- Token de seguridad para formularios en Laravel -->

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE NOMBRE COMPLETO -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre completo:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- INPUT PARA MOSTRAR EL CAMPO DE EDAD -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" class="form-control" value="{{ old('edad') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('edad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- INPUT PARA MOSTRAR EL CAMPO DE SEXO -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="MASCULINO" {{ old('sexo') == 'MASCULINO' ? 'selected' : '' }}>Masculino</option>
                        <option value="FEMENINO" {{ old('sexo') == 'FEMENINO' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('sexo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        
        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE CORREO -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->    
                    @error('correo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- INPUT PARA MOSTRAR EL CAMPO DE CELULAR -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" id="celular" name="celular" class="form-control" value="{{ old('celular') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('celular')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div> 

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE AREA DE ADSCRIPCION -->
            <div class="col-md-3">

                <div class="form-group">
                    <label for="adscripcion">Área de adscripción:</label>
                    <input type="text" id="adscripcion" name="adscripcion" class="form-control" value="{{ old('adscripcion') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('adscripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- INPUT PARA CAPTURAR LA UNIDAD RESPONSABLE -->
            <div class="col-md-3">

                <div class="form-group">
                <label for="unidad_responsable">Unidad responsable:</label>
                <input type="text" id="unidad_responsable" name="unidad_responsable" class="form-control" value="{{ old('unidad_responsable') }}" required>
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('unidad_responsable')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

            </div>
        
            <!-- SELECT PARA MOSTRAR TODOS LOS MUNICIPIOS DEL ESTADO -->
            <div class="col-md-3">

                <div class="form-group">
                <label for="id_municipio">Municipio:</label>
                    <select name="id_municipio" id="id_municipio" class="form-control" required>
                        <option value="" disabled {{ old('id_municipio') ? '' : 'selected' }}>Selecciona una entidad</option>
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->id }}" {{ old('id_municipio') == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE EXISTIR -->
                    @error('id_municipio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

            <!-- INPUT PARA MOSTRAR EL TIPO DE CONTRATACION -->
            <div class="col-md-3">

                <div class="form-group">
                    <label for="tipo_contratacion">Tipo de contratación:</label>
                    <select id="tipo_contratacion" name="tipo_contratacion" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="CONFIANZA" {{ old('tipo_contratacion') == 'CONFIANZA' ? 'selected' : '' }}>CONFIANZA</option>
                        <option value="BASE" {{ old('tipo_contratacion') == 'BASE' ? 'selected' : '' }}>BASE</option>
                        <option value="CONTRATO" {{ old('tipo_contratacion') == 'CONTRATO' ? 'selected' : '' }}>CONTRATO</option>
                        <option value="EN FORMACION" {{ old('tipo_contratacion') == 'EN FORMACION' ? 'selected' : '' }}>EN FORMACION</option>
                        <option value="OTRO" {{ old('tipo_contratacion') == 'OTRO' ? 'selected' : '' }}>OTRO</option>
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('tipo_contratacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
        
        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CARGO -->
            <div class="col-md-3">
            
                <div class="form-group">
                    <label for="cargo">Cargo:</label>
                    <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('cargo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- INPUT PARA MOSTRAR EL CAMPO DE SITUACION DE VULNERABILIDAD -->
            <div class="col-md-3">

                <div class="form-group">
                    <label for="vulnerabilidad">Situación de vulnerabilidad:</label>
                    <select id="vulnerabilidad" name="vulnerabilidad" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="SI" {{ old('vulnerabilidad') == 'SI' ? 'selected' : '' }}>SI</option>
                        <option value="NO" {{ old('vulnerabilidad') == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('vulnerabilidad')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

            <!-- INPUT PARA MOSTRAR EL CUAL SITUACION -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="cual">Cual:</label>
                    <select id="cual" name="cual" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="Personas migrante" {{ old('cual') == 'Personas Migrante' ? 'selected' : '' }}>Personas Migrante</option>
                        <option value="Personas con discapacidad" {{ old('cual') == 'Personas con discapacidad' ? 'selected' : '' }}>Personas con discapacidad</option>
                        <option value="Poblacion indigena" {{ old('cual') == 'Poblacion indigena' ? 'selected' : '' }}>Poblacion indigena</option>
                        <option value="Otra situacion" {{ old('cual') == 'Otra situacion' ? 'selected' : '' }}>Otra situacion</option>
                        <option value="Dos o mas situaciones" {{ old('cual') == 'Dos o mas situaciones' ? 'selected' : '' }}>Dos o mas situaciones</option>
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('cual')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            
        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE TIPO DE SOLICITUD -->
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="tipo_solicitud">Tipo de solicitud:</label>
                    <select id="tipo_solicitud" name="tipo_solicitud" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="ACOSO SEXUAL" {{ old('tipo_solicitud') == 'ACOSO SEXUAL' ? 'selected' : '' }}>Acoso sexual</option>
                        <option value="HOSTIGAMIENTO SEXUAL" {{ old('tipo_solicitud') == 'HOSTIGAMIENTO SEXUAL' ? 'selected' : '' }}>Hostigamiento sexual</option>
                        <option value="OTRO" {{ old('tipo_solicitud') == 'OTRO' ? 'selected' : '' }}>Otra</option>
                    </select>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('tipo_solicitud')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->
       
        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE COMO -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="como">¿Cómo sucedierón?:</label>
                    <textarea id="como" name="como" class="form-control" rows="4" required>{{ old('como') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('como')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->
       
        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE CUANDO -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="cuando">¿Cuándo sucedierón?:</label>
                    <textarea id="cuando" name="cuando" class="form-control" rows="4" required>{{ old('cuando') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('cuando')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE DONDE -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="donde">¿Dónde sucedierón?:</label>
                    <textarea id="donde" name="donde" class="form-control" rows="4" required>{{ old('donde') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('donde')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
        

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE NOMBRE DEL DENUCIADO -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="denunciado_nombre">Nombre completo:</label>
                    <input type="text" id="denunciado_nombre" name="denunciado_nombre" class="form-control" value="{{ old('denunciado_nombre') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('denunciado_nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE CARGO DEL DENUCIADO -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="denunciado_cargo">Cargo:</label>
                    <input type="text" id="denunciado_cargo" name="denunciado_cargo" class="form-control" value="{{ old('denunciado_cargo') }}" required>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('denunciado_cargo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">
                <label for="denunciado_puesto">Puesto:</label>

                    <select id="denunciado_puesto" name="denunciado_puesto" class="form-control" required>
                        <option value="" disabled selected>Selecciona un tipo</option>
                        <option value="HOMOLOGO" {{ old('tipo_contratacion') == 'HOMOLOGO' ? 'selected' : '' }}>HOMOLOGO</option>
                        <option value="SUPERIOR" {{ old('tipo_contratacion') == 'SUPERIOR' ? 'selected' : '' }}>SUPERIOR</option>
                    </select>
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('denunciado_puesto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

            </div>

        </div>

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE ANTECEDENTES DEL DENUCIADO -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="denunciado_antecedentes">¿Cuenta con antecedentes?:</label>
                    <textarea id="denunciado_antecedentes" name="denunciado_antecedentes" class="form-control" rows="4" required>{{ old('denunciado_antecedentes') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('denunciado_antecedentes')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
        

        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">

            <!-- INPUT PARA MOSTRAR EL CAMPO DE TESTIGOS -->
            <div class="col-md-12">

                <div class="form-group">
                    <label for="testigos">Nombres, cargos y teléfonos, especificar si están dispuestos a sustentar lo dicho en escrito</label>
                    <textarea id="testigos" name="testigos" class="form-control" rows="4" required>{{ old('testigos') }}</textarea>
                    <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                    @error('testigos')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
        
        <!-- ---------------------------------------------------------------------------------------------- -->

        <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="file">Archivo <small>Formatos soportados(jpg,jpeg,png,mp4,mp3,pdf,doc,docx) con un tamaño máximo de 10 MB.</small> </label>
                <input type="file" name="archivo" class="form-control-file">
                <!-- MOSTRAMOS EL ERROR EN CASO DE QUE EXISTA -->
                @error('archivo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
    </div>

    <!-- ---------------------------------------------------------------------------------------------- -->

        
            <div class="card-footer">
                <!-- Contenido del pie de la tarjeta -->
                <button type="submit" class="btn btn-info float-right">Registrar denuncia</button>
            </div>
        </form>

    </div>
    
</div>
@stop

@section('footer')
<p>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong></p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop