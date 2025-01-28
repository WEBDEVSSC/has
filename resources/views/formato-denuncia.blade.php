<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formato de Denuncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- ----------------------------------------------- -->

    <div class="container">

        <div class="row mt-3">
            <center><h1>Formato de atención a casos de hostigamiento sexual y acoso sexual</h1></center>
        </div>

    <!-- ----------------------------------------------- -->

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">

                    <p>La Secretaría de Salud en el Estado de Coahulla de Zaragoza, en cumplimiento a la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados del Estado de Coahuila de Zaragoza; será la resguardante de los datos personales proporciandos por Usted para acceder a nuestros trámites y servicios. Sus datos personales se incorporarán a una base de datos denominada "Registro de atención a casos HyAs . A fin de cumplir con la atención a las quejas HyAs , por lo que existe la posibilidad de que los datos personales estrictamente necesarios, sean transferidos a otras Unidades de la  Fiscalía o de la Adminstración Pública
                        Municipal, Estatal y Federal y organismos no gubernamentales, únicamente para la gestión de la atención victimológica integral que su caso requiera. Asi mismo, se informa que tiene derecho a
                        ACCEDER, RECTIFICAR, CANCELAR y OPONERSE al tratamiento o transmisión de los mismos, ante  esta Unidad de Slaud  del Estado de Coahuila de Zaragoza</p>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Aceptar</label>
                        </div>

                  </div>

                    
            </div>
        </div>

    <!-- ----------------------------------------------- -->

        <div class="card mt-3">
            <div class="card-body">
                <p><strong>Tipo de denuncia</strong></p>
                <select name="tipo_denuncia" id="tipo_denuncia" class="form-control">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    <option value="HS">HOSTIGAMIENTO SEXUAL</option>
                    <option value="AS">ACOSO SEXUAL</option>                    
                </select>
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
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Sexo</p>
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Edad</p>
                        <input type="number" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Correo electrónico</p>
                        <input type="email" name="" class="form-control">
                    </div>
                </div>

                <!-- ---------------------------- -->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p>Teléfono de contacto</p>
                        <input type="number" name="" class="form-control" placeholder="10 Digitos">
                    </div>
                    <div class="col-md-3">
                        <p>Tipo de contratación</p>
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="BASE">Base</option>
                            <option value="CONTRATO">Contrato</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Condiciones de vulnerabilidad</p>
                        <select name="condiciones_vulnerabilidad" id="condiciones_vulnerabilidad" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="EMBARAZO">Embarazo</option>
                            <option value="INDIGENA">Indígena</option>
                            <option value="GRUPO LGBT">Grupo LGBT+</option>
                            <option value="DISCAPACIDAD">Discapacidad</option>
                            <option value="OTRO">Otro (Especifique)</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <p>*Especifique</p>
                        <input type="text" name="condiciones_vulnerabilidad_otro" id="condiciones_vulnerabilidad_otro" class="form-control" disabled>
                    </div>
                    
                </div>

                <!-- ---------------------------- -->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p>Unidad de adscripción</p>
                        <select name="clues" id="clues" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            
                            @foreach($clues as $clue)
                                <option value="{{ $clue->id }}">{{ $clue->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Área de adscripción</p>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Puesto que desempeña</p>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Jefe inmediato</p>
                        <input type="text" name="" class="form-control">
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
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Sexo</p>
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p>Edad</p>
                        <input type="number" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Área de adscripción</p>
                        <input type="text" name="" class="form-control">
                    </div>
                </div>

                <!-- ---------------------------------- -->

                <div class="row mt-1">
                    <div class="col-md-3">
                        <p>Puesto que desempeña</p>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <p>Tipo de contratación</p>
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="BASE">Base</option>
                            <option value="CONTRATO">Contrato</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p>Jefe inmediato</p>
                        <input type="text" name="" class="form-control">
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
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                
                    <div class="col-md-3">
                        <select name="relacion_laboral_si" id="relacion_laboral_si" class="form-control" disabled>
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="SI">Jefe inmediato</option>
                            <option value="NO">Compañero/a de trabajo</option>
                            <option value="NO">Personal externo</option>
                        </select>
                    </div>
                
                    <div class="col-md-6">
                        <textarea class="form-control" name="relacion_laboral_no" id="relacion_laboral_no" cols="30" rows="10" placeholder="Describa la relación o los motivos, en su caso, por los cuales trató con la(s) persona(s) presunta(s) agresora(s) en la o las ocasiones en que se presentarón las conductas de hostigamiento sexual o acoso sexual" disabled></textarea>
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
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Como</p>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Cuando</p>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-12">
                        <p>Donde</p>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- ---------------------------------- -->

        <div class="card mt-3">
            <div class="card-header">
                <p><strong>5.- Si cuenta con elementos que pudieran corroborar los hechos antes narrados, favor de adjuntarlos a continuación (Fotografías, testigos, historial de llamadas, notas en papel de invitaciones, correos electrónicos, mensajes, actividad en redes sociales u otros)</strong></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" class="form-control form-control-sm" name="documento_uno">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <input type="file" class="form-control form-control-sm" name="documento_dos">
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
                            <option value="SI">En una ocasión</option>
                            <option value="NO">En más de una ocasión</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <p>Fecha aproximada en la que iniciarón las conductas</p>
                        <input type="date" class="form-control">
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
                            <option value="NO">No</option>
                            <option value="NO SE">No se</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_testigo_si" id="persona_testigo_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, proporcione sus datos de contacto (nombre, correo electrónico y/o su teléfono)"></textarea>
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
                        <select name="persona_relacion" id="persona_relacion" class="form-control"  onchange="toggleRelacionField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_relacion_si" id="persona_relacion_si" cols="30" rows="10" class="form-control" disabled placeholder="¿Qué tipo de relación?"></textarea>
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
                        <select name="persona_trato" id="persona_trato" class="form-control"  onchange="toggleTratoField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="persona_trato_si" id="persona_trato_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, por favor descríbalo"></textarea>
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
                        <select name="padecimiento_fisico" id="padecimiento_fisico" class="form-control"  onchange="togglePadecimientoField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="padecimiento_fisico_si" id="padecimiento_fisico_si" cols="30" rows="10" class="form-control" disabled placeholder="¿Cuáles?"></textarea>
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
                        <select name="integridad" id="integridad" class="form-control"  onchange="toggleIntegridadField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="integridad_si" id="integridad_si" cols="30" rows="10" class="form-control" disabled placeholder="En este caso, ¿Consideras que requiere medidas de protección?"></textarea>
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
                        <select name="amenazada" id="amenazada" class="form-control"  onchange="toggleAmenazadaField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="amenazada_si" id="amenazada_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique"></textarea>
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
                        <select name="adicionales" id="adicionales" class="form-control"  onchange="toggleAdicionalesField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="adicionales_si" id="adicionales_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique"></textarea>
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
                        <select name="denuncia" id="denuncia" class="form-control"  onchange="toggleDenunciaField()">
                            <option value="" disabled selected>-- Seleccione una opción --</option>
                            <option value="NO">No</option>
                            <option value="SI">Si</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <textarea name="denuncia_si" id="denuncia_si" cols="30" rows="10" class="form-control" disabled placeholder="Especifique"></textarea>
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

    <br>
    <br>
    <br>
    <br>
    <br>

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
    </script>

    <!-- -- -->
  </body>
</html>

