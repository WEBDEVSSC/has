@include('micrositio.partials.header')
    <!-- ----------------------------------------------- -->

    <div class="container">

        <div class="row mt-3">
            <center><h1 class="display-8 fw-bold text-black mt-3">Formato de atención a casos de hostigamiento sexual y acoso sexual</h1></center>
        </div>

    <!-- ----------------------------------------------- -->

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">

                    <p>La Secretaría de Salud en el Estado de Coahulla de Zaragoza, en cumplimiento a la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Coahuila de Zaragoza; será la resguardante de los datos personales proporciandos por Usted para acceder a nuestros trámites y servicios. Sus datos personales se incorporarán a una base de datos denominada "Registro de atención a casos HyAs . A fin de cumplir con la atención a las quejas HyAs , por lo que existe la posibilidad de que los datos personales estrictamente necesarios, sean transferidos a otras Unidades de la  Fiscalía o de la Adminstración Pública
                        Municipal, Estatal y Federal y organismos no gubernamentales, únicamente para la gestión de la atención victimológica integral que su caso requiera. Asi mismo, se informa que tiene derecho a
                        ACCEDER, RECTIFICAR, CANCELAR y OPONERSE al tratamiento o transmisión de los mismos, ante  esta Unidad de Salud del Estado de Coahuila de Zaragoza</p>

                        <p>Al momento de presentar una denuncia, se estan aceptando los terminos y condiciones.</p>

                  </div>

                    
            </div>
        </div>

    <!-- ----------------------------------------------- -->

    <form action="{{ route('formatoDenunciaStore') }}" method="POST" enctype="multipart/form-data">

        @csrf
    

    <!-- ----------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-body">
                <p><strong>Tipo de denuncia</strong></p>
                <select name="tipo_denuncia" id="tipo_denuncia" class="form-control">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    <option value="HOSTIGAMIENTO SEXUAL" {{ old('tipo_denuncia') == 'HOSTIGAMIENTO SEXUAL' ? 'selected' : '' }}>HOSTIGAMIENTO SEXUAL</option>
                    <option value="ACOSO SEXUAL" {{ old('tipo_denuncia') == 'ACOSO SEXUAL' ? 'selected' : '' }}>ACOSO SEXUAL</option>
                </select>
                @error('tipo_denuncia')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                
            </div>
            <div class="card-footer">
                <ul>
                    <li><strong>Acoso Sexual : </strong>El acoso sexual se refiere a cualquier conducta o expresión de carácter sexual que resulta inapropiada, no deseada o no solicitada por la persona que la recibe. Esto incluye comentarios, gestos, tocamientos o insinuaciones sexuales.</li>
                    <li><strong>Hostigamiento Sexual : </strong>El hostigamiento sexual es una forma más específica de acoso sexual, generalmente se refiere a una situación en la que una persona en una posición de poder o autoridad (por ejemplo, un jefe, profesor, superior, etc.) hace propuestas sexuales no deseadas a una persona subordinada o dependiente.</li>
                </ul>
            </div>
        </div>
        
        <!-- ---------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>1.- Datos de la presunta víctima o de la persona que narra los hechos</strong></p>
            </div>
            <div class="card-body">
                
                <!-- ---------------------------- -->

                <div class="row">
                    <div class="col-md-3">
                        <p>Nombre</p>
                        <input type="text" name="victima_nombre" id="victima_nombre" class="form-control" value="{{ old('victima_nombre') }}">
                        @error('victima_nombre')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-md-3">
                        <p>Sexo</p>
                        <select name="victima_sexo" id="victima_sexo" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="M" {{ old('victima_sexo') == 'M' ? 'selected' : '' }}>MASCULINO</option>
                            <option value="F" {{ old('victima_sexo') == 'F' ? 'selected' : '' }}>FEMENINO</option>
                        </select>
                        @error('victima_sexo')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-md-3">
                        <p>Edad</p>
                        <input type="number" name="victima_edad" id="victima_edad" class="form-control" value="{{ old('victima_edad') }}">
                        @error('victima_edad')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-md-3">
                        <p>Correo electrónico</p>
                        <input type="email" name="victima_email" id="victima_email" class="form-control" value="{{ old('victima_email') }}">
                        @error('victima_email')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- ---------------------------- -->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p>Teléfono de contacto</p>
                        <input type="number" name="victima_telefono" id="victima_telefono" class="form-control" placeholder="10 Digitos" value="{{ old('victima_telefono') }}">
                        @error('victima_telefono')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-md-3">
                        <p>Tipo de contratación</p>
                        <select name="victima_tipo_contratacion" id="victima_tipo_contratacion" class="form-control" onchange="toggleEnFormacionField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="CONFIANZA" {{ old('victima_tipo_contratacion') == 'CONFIANZA' ? 'selected' : '' }}>CONFIANZA</option>
                            <option value="BASE" {{ old('victima_tipo_contratacion') == 'BASE' ? 'selected' : '' }}>BASE</option>
                            <option value="CONTRATO" {{ old('victima_tipo_contratacion') == 'CONTRATO' ? 'selected' : '' }}>CONTRATO</option>
                            <option value="EN FORMACION" {{ old('victima_tipo_contratacion') == 'EN FORMACION' ? 'selected' : '' }}>EN FORMACION</option>                            
                            <option value="OTRA" {{ old('victima_tipo_contratacion') == 'OTRA' ? 'selected' : '' }}>OTRA</option>
                        </select>       
                        @error('victima_tipo_contratacion')<p class="text-danger mt-2">{{ $message }}</p>@enderror               
                    </div>
                    
                    <div class="col-md-6">
                        <p>Especifique el nombre de la escuela</p>
                        <input type="text" name="victima_enformacion_escuela" id="victima_enformacion_escuela" class="form-control" value="{{ old('victima_enformacion_escuela') }}" disabled>
                        @error('victima_enformacion_escuela')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- ---------------------------- -->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p>Condiciones de vulnerabilidad</p>
                        <select name="victima_condiciones_vulnerabilidad" id="victima_condiciones_vulnerabilidad" class="form-control" onchange="toggleVulnerabilidadField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NINGUNA" {{ old('victima_condiciones_vulnerabilidad') == 'NINGUNA' ? 'selected' : '' }}>NINGUNA</option>
                            <option value="EMBARAZO" {{ old('victima_condiciones_vulnerabilidad') == 'EMBARAZO' ? 'selected' : '' }}>EMBARAZO</option>
                            <option value="INDIGENA" {{ old('victima_condiciones_vulnerabilidad') == 'INDIGENA' ? 'selected' : '' }}>INDIGENA</option>
                            <option value="GRUPO LGBT" {{ old('victima_condiciones_vulnerabilidad') == 'GRUPO LGBT' ? 'selected' : '' }}>GRUPO LGBT</option>
                            <option value="DISCAPACIDAD" {{ old('victima_condiciones_vulnerabilidad') == 'DISCAPACIDAD' ? 'selected' : '' }}>DISCAPACIDAD</option>
                            <option value="OTRO" {{ old('victima_condiciones_vulnerabilidad') == 'OTRO' ? 'selected' : '' }}>OTRO (Especifique)</option>
                        </select>     
                        @error('victima_condiciones_vulnerabilidad')<p class="text-danger mt-2">{{ $message }}</p>@enderror                  
                    </div>
                    
                    <div class="col-md-3">
                        <p>*Especifique</p>
                        <input type="text" name="victima_condiciones_vulnerabilidad_otro" id="victima_condiciones_vulnerabilidad_otro" class="form-control" disabled value="{{ old('victima_condiciones_vulnerabilidad_otro') }}">
                        @error('victima_condiciones_vulnerabilidad_otro')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-md-3">
                        <p>Unidad de adscripción</p>
                        <select name="victima_clues" id="victima_clues" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            @foreach($clues as $clue)
                                <option value="{{ $clue->id }}" {{ old('victima_clues') == $clue->id ? 'selected' : '' }}>
                                    J{{ $clue->jurisdiccion }} - {{ $clue->nombre }} ( {{ $clue->clues }} )
                                </option>
                            @endforeach
                        </select>          
                        @error('victima_clues')<p class="text-danger mt-2">{{ $message }}</p>@enderror                               
                    </div>
                    <div class="col-md-3">
                        <p>Área de adscripción</p>
                        <input type="text" name="victima_area_adscripcion" id="victima_area_adscripcion" class="form-control" value="{{ old('victima_area_adscripcion') }}">
                        @error('victima_area_adscripcion')<p class="text-danger mt-2">{{ $message }}</p>@enderror                  
                    </div>
                    
                </div>

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p>Puesto que desempeña</p>
                        <input type="text" name="victima_puesto_desempena" id="victima_puesto_desempena" class="form-control" value="{{ old('victima_puesto_desempena') }}">
                        @error('victima_puesto_desempena')<p class="text-danger mt-2">{{ $message }}</p>@enderror                  
                    </div>
                    <div class="col-md-3">
                        <p>Jefe inmediato</p>
                        <input type="text" name="victima_jefe_inmediato" id="victima_jefe_inmediato" class="form-control" value="{{ old('victima_jefe_inmediato') }}">
                        @error('victima_jefe_inmediato')<p class="text-danger mt-2">{{ $message }}</p>@enderror                  
                    </div>
                    <div class="col-md-3">
                        <p>Se implementaron medidas de protección</p>
                        <select name="victima_medidas_proteccion" id="victima_medidas_proteccion" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="SI" {{ old('victima_medidas_proteccion') == 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('victima_medidas_proteccion') == 'NO' ? 'selected' : '' }}>NO</option>
                        </select>
                        @error('victima_medidas_proteccion')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-md-3">
                        <p>Solicita medidas de protección</p>
                        <select name="victima_medidas_proteccion_solicita" id="victima_medidas_proteccion_solicita" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="SI" {{ old('victima_medidas_proteccion_solicita') == 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('victima_medidas_proteccion_solicita') == 'NO' ? 'selected' : '' }}>NO</option>
                        </select>
                        @error('victima_medidas_proteccion_solicita')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- ---------------------------- -->

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>2.- Datos de la persona presunta agresora (en caso de contar con ellos)</strong></p>
            </div>
            <div class="card-body">

                <div class="row mt-1">
                    <div class="col-md-3">
                        <p>Nombre</p>
                        <input type="text" name="agresor_nombre" class="form-control" value="{{ old('agresor_nombre') }}">
                        @error('agresor_nombre')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                    <div class="col-md-3">
                        <p>Sexo</p>
                        <select name="agresor_sexo" id="agresor_sexo" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="M" {{ old('agresor_sexo') == 'M' ? 'selected' : '' }}>MASCULINO</option>
                            <option value="F" {{ old('agresor_sexo') == 'F' ? 'selected' : '' }}>FEMENINO</option>
                        </select>  
                        @error('agresor_sexo')<p class="text-danger mt-2">{{ $message }}</p>@enderror                       
                    </div>
                    <div class="col-md-3">
                        <p>Edad</p>
                        <input type="number" name="agresor_edad" id="agresor_edad" class="form-control" value="{{ old('agresor_edad') }}">
                        @error('agresor_edad')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                    <div class="col-md-3">
                        <p>Área de adscripción</p>
                        <input type="text" name="agresor_area" id="agresor_area" class="form-control" value="{{ old('agresor_area') }}">
                        @error('agresor_area')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>

                <!-- ---------------------------------- -->

                <div class="row mt-1">
                    <div class="col-md-3">
                        <p>Puesto que desempeña</p>
                        <input type="text" name="agresor_puesto" id="agresor_puesto" class="form-control" value="{{ old('agresor_puesto') }}">
                        @error('agresor_puesto')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                    <div class="col-md-3">
                        <p>Tipo de contratación</p>
                        <select name="agresor_tipo_contratacion" id="agresor_tipo_contratacion" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="CONFIANZA" {{ old('agresor_tipo_contratacion') == 'CONFIANZA' ? 'selected' : '' }}>CONFIANZA</option>
                            <option value="BASE" {{ old('agresor_tipo_contratacion') == 'BASE' ? 'selected' : '' }}>BASE</option>
                            <option value="CONTRATO" {{ old('agresor_tipo_contratacion') == 'CONTRATO' ? 'selected' : '' }}>CONTRATO</option>
                            <option value="EN FORMACION" {{ old('agresor_tipo_contratacion') == 'EN FORMACION' ? 'selected' : '' }}>EN FORMACION</option>
                        </select>
                        @error('agresor_tipo_contratacion')<p class="text-danger mt-2">{{ $message }}</p>@enderror                        
                    </div>
                    <div class="col-md-6">
                        <p>Jefe inmediato</p>
                        <input type="text" name="agresor_jefe_inmediato" id="agresor_jefe_inmediato" class="form-control" value="{{ old('agresor_jefe_inmediato') }}">
                        @error('agresor_jefe_inmediato')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>

                <!-- ---------------------------------- -->

            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>3.- ¿Existe alguna relación laboral con la persona que está siendo señalada como presunta agresora?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="relacion_laboral" id="relacion_laboral" class="form-control" onchange="toggleFields()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="SI" {{ old('relacion_laboral') == 'SI' ? 'selected' : '' }}>SI</option>
                            <option value="NO" {{ old('relacion_laboral') == 'NO' ? 'selected' : '' }}>NO</option>
                        </select> 
                        @error('relacion_laboral')<p class="text-danger mt-2">{{ $message }}</p>@enderror                       
                    </div>
                
                    <div class="col-md-3">
                        <select name="relacion_laboral_si" id="relacion_laboral_si" class="form-control" disabled>
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="JEFE INMEDIATO" {{ old('relacion_laboral_si') == 'JEFE INMEDIATO' ? 'selected' : '' }}>JEFE INMEDIATO</option>
                            <option value="COMPAÑERO/A DE TRABAJO" {{ old('relacion_laboral_si') == 'COMPAÑERO/A DE TRABAJO' ? 'selected' : '' }}>COMPAÑERO/A DE TRABAJO</option>
                            <option value="PERSONAL EXTERNO" {{ old('relacion_laboral_si') == 'PERSONAL EXTERNO' ? 'selected' : '' }}>PERSONAL EXTERNO</option>
                        </select>    
                        @error('relacion_laboral_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror                      
                    </div>
                
                    <div class="col-md-6">
                        <textarea class="form-control" name="relacion_laboral_no" id="relacion_laboral_no" cols="30" rows="10" placeholder="Describa la relación o los motivos, en su caso, por los cuales trató con la(s) persona(s) presunta(s) agresora(s) en la o las ocasiones en que se presentarón las conductas de hostigamiento sexual o acoso sexual" disabled>{{ old('relacion_laboral_no') }}</textarea>
                        @error('relacion_laboral_no')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
                
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>4.- Narre todo lo relacionado con los hechos ocurridos sobre el hostigamiento sexual y/o acoso sexual en su contra o en contra de otra persona (describa la situación considerando aspectos como tipo de conducta(s), miradas lascivas, tocamientos, comentarios, propuestas sexuales, etcétera, temporalidad, por ejemplo, momento en el que ocurre, circunstancias como horarios, dentro o fuera del trabajo, lugares, ambiente; trate de describir circunstancias de tiempo (¿cuándo?), lugar (¿dónde?) y modo (¿cómo?) lo más claro posible:</strong></p>
            </div>
            <div class="card-body">
                

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Situación</p>
                        <textarea name="situacion" id="situacion" cols="30" rows="10" class="form-control">{{ old('situacion') }}</textarea>
                        @error('situacion')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Como</p>
                        <textarea name="como" id="como" cols="30" rows="10" class="form-control">{{ old('como') }}</textarea>
                        @error('como')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Cuando</p>
                        <textarea name="cuando" id="cuando" cols="30" rows="10" class="form-control">{{ old('cuando') }}</textarea>
                        @error('cuando')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Donde</p>
                        <textarea name="donde" id="donde" cols="30" rows="10" class="form-control">{{ old('donde') }}</textarea>
                        @error('donde')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>5.- Si cuenta con elementos que pudieran corroborar los hechos antes narrados, favor de adjuntarlos a continuación (Fotografías, testigos, historial de llamadas, notas en papel de invitaciones, correos electrónicos, mensajes, actividad en redes sociales u otros)</strong> <br> <small>(Archivos soportados : jpg,jpeg,png,gif,mp4,mov,avi,mp3,wav,pdf,doc,docx)</small></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" class="form-control form-control-sm" name="documento_uno" id="documento_uno">
                        @error('documento_uno')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <input type="file" class="form-control form-control-sm" name="documento_dos" id="documento_dos">
                        @error('documento_dos')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
                
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>6.- ¿La conducta ha ocurrido?</strong></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>.</p>
                        <select name="conducta_ocurrido" id="conducta_ocurrido" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="EN UNA OCASION" {{ old('conducta_ocurrido') == 'EN UNA OCASION' ? 'selected' : '' }}>EN UNA OCASION</option>
                            <option value="EN MAS DE UNA OCASION" {{ old('conducta_ocurrido') == 'EN MAS DE UNA OCASION' ? 'selected' : '' }}>EN MAS DE UNA OCASION</option>
                        </select>    
                        @error('conducta_ocurrido')<p class="text-danger mt-2">{{ $message }}</p>@enderror                    
                    </div>

                    <div class="col-md-6">
                        <p>Fecha aproximada en la que iniciarón las conductas</p>
                        <input type="date" name="conducta_ocurrido_fecha" id="conducta_ocurrido_fecha" class="form-control" value="{{ old('conducta_ocurrido_fecha') }}">
                        @error('conducta_ocurrido_fecha')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                </div>
                
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>7.- ¿Alguna persona o personas presenciaron los hechos narrados (punto4)?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="persona_testigo" id="persona_testigo" class="form-control" onchange="toggleTestigoField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('persona_testigo') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="NO SE" {{ old('persona_testigo') == 'NO SE' ? 'selected' : '' }}>NO SE</option>
                            <option value="SI" {{ old('persona_testigo') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>   
                        @error('persona_testigo')<p class="text-danger mt-2">{{ $message }}</p>@enderror                     
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_testigo_si" id="persona_testigo_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, proporcione sus datos de contacto (nombre, correo electrónico y/o su teléfono)">{{ old('persona_testigo_si') }}</textarea>
                        @error('persona_testigo_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>8.- ¿Las personas que han presenciado los hechos narrados (punto 4) guardan alguna relación con la persona presunta agresora?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="persona_relacion" id="persona_relacion" class="form-control" onchange="toggleRelacionField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('persona_relacion') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('persona_relacion') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>       
                        @error('persona_relacion')<p class="text-danger mt-2">{{ $message }}</p>>@enderror                 
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_relacion_si" id="persona_relacion_si" cols="30" rows="10" class="form-control" disabled placeholder="¿Qué tipo de relación?">{{ old('persona_relacion_si') }}</textarea>
                        @error('persona_relacion_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror       
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>9.- ¿Identifica un trato diferenciado hacia usted por parte de la persona presunta agresora, antes y después de los hechos narrados (Ha cambiado la relación laboral)?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="persona_trato" id="persona_trato" class="form-control" onchange="toggleTratoField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('persona_trato') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('persona_trato') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>     
                        @error('persona_trato')<p class="text-danger mt-2">{{ $message }}</p>@enderror                         
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_trato_si" id="persona_trato_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, por favor descríbalo">{{ old('persona_trato_si') }}</textarea>
                        @error('persona_trato_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror      
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>10.- A partir de lo que ha sucedido con la conducta narrada, ¿usted ha presentado algún tipo de padecimiento físico, como dolor de cabeza, dificultades gástricas u otras enfermedades reiterativas?; ¿Problemas de orden emocional, como miedo, angustia, inseguridad, dificultades para dormir o concentrarse, desánimo, tristeza, entre otras? o ¿Problemas de tipo social que afecten sus relaciones cotidianas?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="padecimiento_fisico" id="padecimiento_fisico" class="form-control" onchange="togglePadecimientoField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('padecimiento_fisico') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('padecimiento_fisico') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>   
                        @error('padecimiento_fisico')<p class="text-danger mt-2">{{ $message }}</p>@enderror                       
                    </div>

                    <div class="col-md-9">
                        <textarea name="padecimiento_fisico_si" id="padecimiento_fisico_si" cols="30" rows="10" class="form-control" disabled placeholder="¿Cuáles?">{{ old('padecimiento_fisico_si') }}</textarea>
                        @error('padecimiento_fisico_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>11.- ¿Considera que su integridad física o emocional se encuentra en riesgo?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="integridad" id="integridad" class="form-control" onchange="toggleIntegridadField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('integridad') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('integridad') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>      
                        @error('integridad')<p class="text-danger mt-2">{{ $message }}</p>@enderror                    
                    </div>

                    <div class="col-md-9">
                        <textarea name="integridad_si" id="integridad_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, ¿Consideras que requiere medidas de protección?">{{ old('integridad_si') }}</textarea>
                        @error('integridad_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>12.- ¿Ha sido amenazada, advertida, coaccionada o intimidada de alguna manera con posibles represalias por negarse a las propuestas o por tratar de detener la situación?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="amenazada" id="amenazada" class="form-control" onchange="toggleAmenazadaField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('amenazada') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('amenazada') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>
                        @error('amenazada')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>

                    <div class="col-md-9">
                        <textarea name="amenazada_si" id="amenazada_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique">{{ old('amenazada_si') }}</textarea>
                        @error('amenazada_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror  
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>13.- ¿Hay datos adicionales que puede proporcionar para fortalecer los hechos narrados?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="adicionales" id="adicionales" class="form-control" onchange="toggleAdicionalesField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('adicionales') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('adicionales') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>  
                        @error('adicionales')<p class="text-danger mt-2">{{ $message }}</p>@enderror                            
                    </div>

                    <div class="col-md-9">
                        <textarea name="adicionales_si" id="adicionales_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique">{{ old('adicionales_si') }}</textarea> 
                        @error('adicionales_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror       
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>14.- ¿Ha presentado alguna denuncia formal ante alguna instancia (Comité de ética, Órgano Interno de Control o Ministerio Público)?</strong></p>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <select name="denuncia" id="denuncia" class="form-control" onchange="toggleDenunciaField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO" {{ old('denuncia') == 'NO' ? 'selected' : '' }}>NO</option>
                            <option value="SI" {{ old('denuncia') == 'SI' ? 'selected' : '' }}>SI</option>
                        </select>     
                        @error('denuncia')<p class="text-danger mt-2">{{ $message }}</p>@enderror                   
                    </div>

                    <div class="col-md-9">
                        <textarea name="denuncia_si" id="denuncia_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique">{{ old('denuncia_si') }}</textarea>
                        @error('denuncia_si')<p class="text-danger mt-2">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-block btn-sm">PRESENTAR DENUNCIA</button>
            </div>
        </div>
       
    </div><!-- CONTAINER -->

</form>

    <br>
    <br>
    <br>
    <br>
    <br>

    @section('plugins.Sweetalert2', true)

    @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Registro Correcto',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                });
            </script>
        @endif

            <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6k3I4F+VppvIEnq0u5tkU7l1RZm5SaaPqC+78LUeF9v/8gV56N4FJP" crossorigin="anonymous"></script>

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Incluye Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Incluye jQuery y Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>-->

    <!-- ----------------------------------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- SCRIPT PARA SITUACION DE VULNERABILIDAD OTRO -->

    <script>
        document.getElementById('condiciones_vulnerabilidad').addEventListener('change', function() {
            var selectValue = this.value;
            var inputOtro = document.getElementById('condiciones_vulnerabilidad_otro');
            
            if (selectValue === 'OTRO') {
                inputOtro.disabled = false; // Habilitar el campo si se selecciona "OTRO"
            } else {
                inputOtro.disabled = true;  // Deshabilitar el campo si no se selecciona "OTRO"
                inputOtro.value = ''; // Limpiar el valor del campo
            }
        });

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            getElementById(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->

    <!-- SCRIPT RELACION LABORAL SI/NO -->

    <script>
        function toggleFields() {
            var seleccion = document.getElementById('relacion_laboral').value;
            var campoSi = document.getElementById('relacion_laboral_si');
            var campoNo = document.getElementById('relacion_laboral_no');
            
            if (seleccion === 'SI') {
                campoSi.disabled = false; // Habilitar el campo "relacion_laboral_si"
                campoNo.disabled = true;  // Deshabilitar el campo "relacion_laboral_no"
            } else if (seleccion === 'NO') {
                campoSi.disabled = true;  // Deshabilitar el campo "relacion_laboral_si"
                campoNo.disabled = false; // Habilitar el campo "relacion_laboral_no"
            } else {
                campoSi.disabled = true;  // Deshabilitar ambos si no hay selección
                campoNo.disabled = true;
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- SCRIPT PUNTO 7 -->

    <script>
        function toggleTestigoField() {
            var personaTestigo = document.getElementById('persona_testigo').value;
            var personaTestigoSi = document.getElementById('persona_testigo_si');
            
            if (personaTestigo === 'SI') {
                personaTestigoSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                personaTestigoSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleTestigoField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->

    <!-- SCRIPT PUNTO 8 -->

    <script>
        function toggleRelacionField() {
            var personaRelacion = document.getElementById('persona_relacion').value;
            var personaRelacionSi = document.getElementById('persona_relacion_si');
            
            if (personaRelacion === 'SI') {
                personaRelacionSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                personaRelacionSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleRelacionField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 9 -->

    <script>
        function toggleTratoField() {
            var personaTrato = document.getElementById('persona_trato').value;
            var personaTratoSi = document.getElementById('persona_trato_si');
            
            if (personaTrato === 'SI') {
                personaTratoSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                personaTratoSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleTratoField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 10 -->

    <script>
        function togglePadecimientoField() {
            var padecimientoFisico = document.getElementById('padecimiento_fisico').value;
            var padecimientoFisicoSi = document.getElementById('padecimiento_fisico_si');
            
            if (padecimientoFisico === 'SI') {
                padecimientoFisicoSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                padecimientoFisicoSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            togglePadecimientoField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 11 -->

    <script>
        function toggleIntegridadField() {
            var integridad = document.getElementById('integridad').value;
            var integridadSi = document.getElementById('integridad_si');
            
            if (integridad === 'SI') {
                integridadSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                integridadSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleIntegridadField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 12 -->

    <script>
        function toggleAmenazadaField() {
            var amenazada = document.getElementById('amenazada').value;
            var amenazadaSi = document.getElementById('amenazada_si');
            
            if (amenazada === 'SI') {
                amenazadaSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                amenazadaSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleAmenazadaField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 13 -->

    <script>
        function toggleAdicionalesField() {
            var adicionales = document.getElementById('adicionales').value;
            var adicionalesSi = document.getElementById('adicionales_si');
            
            if (adicionales === 'SI') {
                adicionalesSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                adicionalesSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleAdicionalesField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
    <!-- SCRIPT PUNTO 14 -->

    <script>
        function toggleDenunciaField() {
            var denuncia = document.getElementById('denuncia').value;
            var denunciaSi = document.getElementById('denuncia_si');
            
            if (denuncia === 'SI') {
                denunciaSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                denunciaSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleDenunciaField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->
     <!-- CONDICIONES DE VULNERABILIDAD -->

     <script>
        function toggleVulnerabilidadField() {
            var vulnerabilidad = document.getElementById('victima_condiciones_vulnerabilidad').value;
            var vulnerabilidadSi = document.getElementById('victima_condiciones_vulnerabilidad_otro');
            
            if (vulnerabilidad === 'OTRO') {
                vulnerabilidadSi.disabled = false;  // Habilitar el campo "persona_testigo_si"
            } else {
                vulnerabilidadSi.disabled = true;   // Deshabilitar el campo "persona_testigo_si"
            }
        }

        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleVulnerabilidadField(); // Ajusta el estado del campo al cargar la página
        });
    </script>

    <!-- -- -->

    <!-- TIPO DE CONTRATACION EN FORMACION ABRE ESPACIO NOMBRE ESCUELA -->

    <script>
        function toggleEnFormacionField() {
            var tipoContratacion = document.getElementById('victima_tipo_contratacion').value;
            var escuelaField = document.getElementById('victima_enformacion_escuela');
            
            if (tipoContratacion === 'EN FORMACION') {
                escuelaField.disabled = false;  // Habilitar el campo "Especifique el nombre de la escuela"
            } else {
                escuelaField.disabled = true;   // Deshabilitar el campo "Especifique el nombre de la escuela"
            }
        }
        
        // Llamada inicial para configurar el estado del campo al cargar la página, en caso de que se haya enviado previamente el formulario
        document.addEventListener('DOMContentLoaded', function() {
            toggleEnFormacionField(); // Ajusta el estado del campo al cargar la página
        });
    </script>
    <!-- -- -->
  </body>
</html>

