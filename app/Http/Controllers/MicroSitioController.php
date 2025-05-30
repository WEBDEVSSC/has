<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaNuevaMail;
use App\Mail\DenunciaReincidenciaMail;
use App\Models\Clue;
use App\Models\Denuncia;
use App\Models\DenunciaReincidencia;
use App\Models\DenunciaSeguimiento;
use App\Models\Municipio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MicroSitioController extends Controller
{
    //

    public function formatoDenuncia()
    {
        // Consultamos todas las CLUES
        $clues = Clue::orderBy('jurisdiccion', 'asc')->orderBy('nombre', 'asc')->get();
        
        return view('formato-denuncia', compact('clues'));
    }

    public function formatoDenunciaStore(Request $request)
    {
        //dd($request->documento_dos);
        // Validamos los datos
        $request -> validate([
            'captcha' => 'required|captcha',
            //0
            'tipo_denuncia' => 'required',
            //1
            'victima_nombre' => 'required',
            'victima_sexo' => 'required',
            'victima_edad' => 'required',
            'victima_email' => 'email|required',
            'victima_telefono' => 'required|max:10|min:10',
            'victima_tipo_contratacion' => 'required',
            'victima_enformacion_escuela' => 'required_if:victima_tipo_contratacion,EN FORMACION',
            'victima_condiciones_vulnerabilidad' => 'required',
            'victima_condiciones_vulnerabilidad_otro' => 'string',
            'victima_clues' => 'required',
            'victima_area_adscripcion' => 'required',
            'victima_puesto_desempena' => 'required',
            'victima_jefe_inmediato' => 'required',
            'victima_medidas_proteccion' => 'required',
            'victima_medidas_proteccion_solicita' => 'required',
            
            //2
            'agresor_nombre' => 'required',
            'agresor_sexo' => 'required',
            'agresor_edad' => 'required',
            'agresor_area' => 'required',
            'agresor_puesto' => 'required',
            'agresor_tipo_contratacion' => 'required',
            'agresor_jefe_inmediato' => 'required',
            
            //3
            'relacion_laboral' => 'required',
            'relacion_laboral_si' => 'required_if:relacion_laboral,SI',
            'relacion_laboral_no' => 'required_if:relacion_laboral,NO',

            //4
            'situacion' => 'required',
            'como' => 'required',
            'cuando' => 'required',
            'donde' => 'required',

            //5
            'documento_uno' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi,mp3,wav,pdf,doc,docx|max:15240',
            'documento_dos' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi,mp3,wav,pdf,doc,docx|max:15240',
            
            //6
            'conducta_ocurrido' => 'required',
            'conducta_ocurrido_fecha' => 'required',

            //7
            'persona_testigo' => 'required',
            'persona_testigo_si' => 'required_if:persona_testigo,SI',
            //8
            'persona_relacion'=> 'required',
            'persona_relacion_si' => 'required_if:persona_relacion,SI',
            //9
            'persona_trato' => 'required',
            'persona_trato_si' => 'required_if:persona_trato,SI',
            //10
            'padecimiento_fisico' => 'required',
            'padecimiento_fisico_si' => 'required_if:padecimiento_fisico,SI',
            //11
            'integridad' => 'required',
            'integridad_si'  => 'required_if:integridad,SI',
            //12
            'amenazada' => 'required',
            'amenazada_si' => 'required_if:amenazada,SI',
            //13
            'adicionales' => 'required',
            'adicionales_si' => 'required_if:adicionales,SI',
            //14
            'denuncia' => 'required',
            'denuncia_si' => 'required_if:denuncia,SI',
        ],[
            'captcha.required' => 'Por favor, resuelve el captcha.',
            'captcha.captcha' => 'El captcha ingresado es incorrecto, favor de seleccionar de nuevos los archivos .',
            // Mensajes personalizados para cada campo
            //0
            'tipo_denuncia.required' => 'El campo tipo de denuncia es obligatorio.',
            //1
            'victima_nombre.required' => 'El campo nombre de la víctima es obligatorio.',
            'victima_sexo.required' => 'El campo sexo de la víctima es obligatorio.',
            'victima_edad.required' => 'El campo edad de la víctima es obligatorio.',
            'victima_email.required' => 'El campo correo electrónico de la víctima es obligatorio.',
            'victima_email.email' => 'El campo correo electrónico de la víctima debe ser una dirección de correo válida.',
            'victima_telefono.required' => 'El campo teléfono de la víctima es obligatorio.',
            'victima_telefono.max' => 'El campo teléfono de la víctima debe tener máximo 10 caracteres.',
            'victima_telefono.min' => 'El campo teléfono de la víctima debe tener mínimo 10 caracteres.',
            'victima_tipo_contratacion.required' => 'El campo tipo de contratación de la víctima es obligatorio.',
            'victima_enformacion_escuela.required_if' => 'El campo información de la escuela es obligatorio cuando el tipo de contratación es "EN FORMACIÓN".',
            'victima_condiciones_vulnerabilidad.required' => 'El campo condiciones de vulnerabilidad de la víctima es obligatorio.',
            'victima_condiciones_vulnerabilidad_otro.string' => 'El campo otras condiciones de vulnerabilidad debe ser una cadena de texto.',
            'victima_clues.required' => 'El campo CLUES de la víctima es obligatorio.',
            'victima_area_adscripcion.required' => 'El campo área de adscripción de la víctima es obligatorio.',
            'victima_puesto_desempena.required' => 'El campo puesto que desempeña la víctima es obligatorio.',
            'victima_jefe_inmediato.required' => 'El campo jefe inmediato de la víctima es obligatorio.',
            'victima_medidas_proteccion.required' => 'El campo medidas de protección de la víctima es obligatorio.',
            'victima_medidas_proteccion_solicita.required' => 'El campo medidas de protección de la víctima es obligatorio.',
            //2
            'agresor_nombre.required' => 'El campo nombre del agresor es obligatorio.',
            'agresor_sexo.required' => 'El campo sexo del agresor es obligatorio.',
            'agresor_edad.required' => 'El campo edad del agresor es obligatorio.',
            'agresor_area.required' => 'El campo área del agresor es obligatorio.',
            'agresor_puesto.required' => 'El campo puesto del agresor es obligatorio.',
            'agresor_tipo_contratacion.required' => 'El campo tipo de contratación del agresor es obligatorio.',
            'agresor_jefe_inmediato.required' => 'El campo jefe inmediato del agresor es obligatorio.',
            //3
            'relacion_laboral.required' => 'El campo relación laboral es obligatorio.',
            'relacion_laboral_si.required_if' => 'El campo relación laboral (SI) es obligatorio cuando la relación laboral es "SI".',
            'relacion_laboral_no.required_if' => 'El campo relación laboral (NO) es obligatorio cuando la relación laboral es "NO".',
            //4
            'situacion.required' => 'El campo situación es obligatorio.',
            'como.required' => 'El campo cómo ocurrió es obligatorio.',
            'cuando.required' => 'El campo cuándo ocurrió es obligatorio.',
            'donde.required' => 'El campo dónde ocurrió es obligatorio.',
            //5
            'documento_uno.file' => 'El documento uno debe ser un archivo válido.',
            'documento_uno.mimes' => 'El documento uno debe ser un tipo de archivo permitido (jpg, jpeg, png, gif, mp4, mov, avi, mp3, wav, pdf, doc, docx).',
            'documento_uno.max' => 'El documento uno no debe superar los 15 MB.',

            'documento_dos.file' => 'El documento dos debe ser un archivo válido.',
            'documento_dos.mimes' => 'El documento dos debe ser un tipo de archivo permitido (jpg, jpeg, png, gif, mp4, mov, avi, mp3, wav, pdf, doc, docx).',
            'documento_dos.max' => 'El documento dos no debe superar los 15 MB.',
            //6
            'conducta_ocurrido.required' => 'El campo conducta ocurrida es obligatorio.',
            'conducta_ocurrido_fecha.required' => 'El campo fecha de la conducta ocurrida es obligatorio.',
            //7
            'persona_testigo.required' => 'El campo persona testigo es obligatorio.',
            'persona_testigo_si.required_if' => 'El campo persona testigo (SI) es obligatorio cuando hay un testigo.',
            //8
            'persona_relacion.required' => 'El campo persona relacionada es obligatorio.',
            'persona_relacion_si.required_if' => 'El campo persona relacionada (SI) es obligatorio cuando hay una relación.',
            //9
            'persona_trato.required' => 'El campo trato de la persona es obligatorio.',
            'persona_trato_si.required_if' => 'El campo trato de la persona (SI) es obligatorio cuando hay un trato específico.',
            //10
            'padecimiento_fisico.required' => 'El campo padecimiento físico es obligatorio.',
            'padecimiento_fisico_si.required_if' => 'El campo padecimiento físico (SI) es obligatorio cuando hay un padecimiento.',
            //11
            'integridad.required' => 'El campo integridad es obligatorio.',
            'integridad_si.required_if' => 'El campo integridad (SI) es obligatorio cuando se afecta la integridad.',
            //12
            'amenazada.required' => 'El campo amenazada es obligatorio.',
            'amenazada_si.required_if' => 'El campo amenazada (SI) es obligatorio cuando hay una amenaza.',
            //13
            'adicionales.required' => 'El campo adicionales es obligatorio.',
            'adicionales_si.required_if' => 'El campo adicionales (SI) es obligatorio cuando hay información adicional.',
            //14
            'denuncia.required' => 'El campo denuncia es obligatorio.',
            'denuncia_si.required_if' => 'El campo denuncia (SI) es obligatorio cuando se presenta una denuncia.',
        ]);

        

        // Generamos el status
        $status = "NUEVO";

        // Generamos el folio
        $folio = '';

        for ($i = 0; $i < 6; $i++) 
        {
            $folio .= mt_rand(0, 9); // Concatena un número aleatorio entre 0 y 9
        }

        // Consultamos los datos de la clues
        $clues = Clue::findOrFail($request->victima_clues);

        /**
         * 
         * 
         * 
         * 
         */

        $archivoPathUno = null;
        $archivoPathDos = null;

         // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        if ($request->hasFile('documento_uno') && $request->file('documento_uno')->isValid()) {
            $archivoNombre = $folio . '_E1_' . $timestamp . '.' . $request->file('documento_uno')->extension();
            $archivoPathUno = $request->file('documento_uno')->storeAs('documents/denuncia', $archivoNombre, 'local');
        }

        if ($request->hasFile('documento_dos') && $request->file('documento_dos')->isValid()) {
            $archivoNombreDos = $folio . '_E2_' . $timestamp . '.' . $request->file('documento_dos')->extension();
            $archivoPathDos = $request->file('documento_dos')->storeAs('documents/denuncia', $archivoNombreDos, 'local');
        }

        /**
         * 
         * 
         * 
         * 
         * 
         */

        // Creamos el objeto para almacenar
        $denuncia = new Denuncia();

        // Asignamos los campos
        $denuncia->tipo_denuncia = $request->tipo_denuncia;
        $denuncia->victima_nombre = $request->victima_nombre;
        $denuncia->victima_sexo = $request->victima_sexo;
        $denuncia->victima_edad = $request->victima_edad;
        $denuncia->victima_email = $request->victima_email;
        $denuncia->victima_telefono = $request->victima_telefono;
        $denuncia->victima_tipo_contratacion = $request->victima_tipo_contratacion;
        $denuncia->victima_enformacion_escuela = $request->victima_enformacion_escuela;
        $denuncia->victima_condiciones_vulnerabilidad = $request->victima_condiciones_vulnerabilidad;
        $denuncia->victima_condiciones_vulnerabilidad_otro = $request->victima_condiciones_vulnerabilidad_otro;
        $denuncia->victima_clues = $request->victima_clues;
        $denuncia->victima_area_adscripcion = $request->victima_area_adscripcion;
        $denuncia->victima_puesto_desempena = $request->victima_puesto_desempena;
        $denuncia->victima_jefe_inmediato = $request->victima_jefe_inmediato;
        $denuncia->victima_medidas_proteccion = $request->victima_medidas_proteccion;
        $denuncia->victima_medidas_proteccion_solicita = $request->victima_medidas_proteccion_solicita;

        $denuncia->clues_nombre = $clues->nombre;
        $denuncia->clues_municipio = "1";
        $denuncia->clues_municipio_label = $clues->municipio;
        $denuncia->clues_jurisdiccion = $clues->jurisdiccion;
        $denuncia->clues_jurisdiccion_label = $clues->jurisdiccion_label;

        $denuncia->agresor_nombre = $request->agresor_nombre;
        $denuncia->agresor_sexo = $request->agresor_sexo;
        $denuncia->agresor_edad = $request->agresor_edad;
        $denuncia->agresor_area = $request->agresor_area;
        $denuncia->agresor_puesto = $request->agresor_puesto;
        $denuncia->agresor_tipo_contratacion = $request->agresor_tipo_contratacion;
        $denuncia->agresor_jefe_inmediato = $request->	agresor_jefe_inmediato;

        $denuncia->relacion_laboral = $request->relacion_laboral;
        $denuncia->relacion_laboral_si = $request->relacion_laboral_si;
        $denuncia->relacion_laboral_no = $request->relacion_laboral_no;

        $denuncia->situacion = $request->situacion;
        $denuncia->como = $request->como;
        $denuncia->cuando = $request->cuando;
        $denuncia->donde = $request->donde;

        $denuncia->documento_uno = $archivoPathUno;
        $denuncia->documento_dos = $archivoPathDos;

        $denuncia->conducta_ocurrido = $request->conducta_ocurrido;
        $denuncia->conducta_ocurrido_fecha = $request->conducta_ocurrido_fecha;

        $denuncia->persona_testigo = $request->persona_testigo;
        $denuncia->persona_testigo_si = $request->persona_testigo_si;

        $denuncia->persona_relacion = $request->persona_relacion;
        $denuncia->persona_relacion_si = $request->persona_relacion_si;

        $denuncia->persona_trato = $request->persona_trato;
        $denuncia->persona_trato_si = $request->persona_trato_si;

        $denuncia->padecimiento_fisico = $request->padecimiento_fisico;
        $denuncia->padecimiento_fisico_si = $request->padecimiento_fisico_si;

        $denuncia->integridad = $request->integridad;
        $denuncia->integridad_si = $request->integridad_si;

        $denuncia->amenazada = $request->amenazada;
        $denuncia->amenazada_si = $request->amenazada_si;

        $denuncia->adicionales = $request->adicionales;
        $denuncia->adicionales_si = $request->adicionales_si;

        $denuncia->denuncia = $request->denuncia;
        $denuncia->denuncia_si = $request->denuncia_si;

        $denuncia->folio = $folio;
        $denuncia->status = $status;

        $denuncia->save();
        
        // Consultamos el ID
        $id = $denuncia->id;

        // Enviamos el correo de notificacion
        $emails = User::where('notificacion', 1)
              ->pluck('email')
              ->toArray();

        // Agregar el correo del request, si no está vacío
        if (!empty($request->victima_email)) {
            $emails[] = $request->victima_email;
        }

        // Eliminar duplicados por si acaso
        $emails = array_unique($emails);

        // Enviamos el email
        Mail::to($emails)->send(new DenunciaNuevaMail($folio, $id));

        //-----------------------------------------------------------------------------------------------------------

            // Enviamos mensajes por TELEGRAM
            $token = env('TELEGRAM_BOT_TOKEN');

            // Buscamos los registros que tengan el campo chat_id lleno
            $chat_ids = User::whereNotNull('chat_id')
                ->pluck('chat_id')
                ->toArray();

            // Creamos el mensaje
            $mensaje = '👥 Programa de Igualdad de Género' . "\n" .
                        "\n" .
                        '🚨 Se ha registrado una nueva denuncia' . "\n" .
                        '📝 Folio: HAS/SSC/2025/' . $folio . "\n" .
                        '🏥 Unidad: ' . $clues->nombre . "\n";

            // Recorrimos el arreglo y mandamos los mensajes
            foreach ($chat_ids as $chat_id) 
            {
                $response = Http::withOptions([
                    'verify' => false, // Desactiva verificación SSL (útil para pruebas locales)
                ])->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => $mensaje,
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [[
                            [
                                'text' => '🔗 Ver denuncia',                                
                                'url' => url('admin/'.$id.'/detalles')
                            ]
                            
                        ]]
                    ]),
                ]);

                // Puedes revisar cada respuesta si gustas
                //dump("Mensaje enviado a {$chat_id}", $response->json());
            }

             //-----------------------------------------------------------------------------------------------------------
        
        $anio = date('Y');

        // Redireccionamos al formulario con el mensaje de exito
        return redirect()->route('formatoDenuncia')->with('success', 'La denuncia se registro correctamente con el folio : HAS/SSC/'.$anio.'/'.$folio);      

    }

    public function inicio()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.inicio');
    }

    public function protocolo()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.protocolo');
    }
    
    public function pronunciamiento()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.pronunciamiento');
    }

    public function queEs()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.queEs');
    }

    /*
    *
    *
    * SEGUIMIENTO
    *
    */

    public function buzonSeguimiento()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.buzonSeguimiento');
    }

    public function buzonSeguimientoShow(Request $request)
    {
        
        // Validamos los datos
        $request->validate([
                'captcha' => 'required|captcha',
                'folio' => 'required|digits:6',
            ], [
                'captcha.required' => 'El captcha es obligatorio.',
                'captcha.captcha' => 'El captcha ingresado es incorrecto.',
                'folio.required' => 'El folio es obligatorio.',
                'folio.digits' => 'El folio debe tener exactamente 6 dígitos.',
            ]);

        // Busca la denuncia por el folio
        $denuncia = Denuncia::where('folio', $request->folio)->first();   
        
        // Verificamos si se encontro la denuncia
        if ($denuncia) 
        {
            // Obtén el ID del registro encontrado
            $id = $denuncia->id; 

            // Busca todos los seguimientos que coincidan con el ID en el campo 'relacion'
            $seguimientos = DenunciaSeguimiento::where('relacion', $id)
                ->orderBy('created_at', 'desc')
                ->get();

            // Retorna la vista con los resultados
            return view('micrositio.buzonSeguimientoShow', [
                'denuncia' => $denuncia,
                'seguimientos' => $seguimientos,
            ]);
        } 
        else 
        {
            return redirect()->route('buzonSeguimiento')->with('error', 'Folio no encontrado.');
        }
        
    }

    /*
    *
    *
    * REINCIDENCIA
    *
    */

    public function buzonReincidencia()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.buzonReincidencia');
    }

    public function buzonReincidenciaCreate(Request $request)
    {
        
        // Validamos los datos ingresados
        $validatedData = $request->validate([
            'folio' => 'required|numeric|digits:6',
            'captcha' => 'required|captcha',
        ],[
            'folio.required' => 'El folio es necesario',
            'folio.numeric' => 'El folio debe ser numerico',
            'folio.digits' => 'El folio debe ser de 6 digitos',
            'captcha.required' => 'El captcha es obligatorio.',
            'captcha.captcha' => 'El captcha ingresado es incorrecto.',
        ]);

        // Buscamos el id que corresponda a ese folio y lo almacenamos en id_denuncia
        $denuncia = Denuncia::where('folio', $request->folio)->first();

        // Si no se encuentra la denuncia, redirigimos con un mensaje de error
        if (!$denuncia) 
        {
            return redirect()->back()->withErrors(['folio' => 'No se encontró una denuncia con el folio proporcionado.']);
        }
        
        // Pasamos el id_denuncia al formulario para realizar un registro    
        return view('micrositio.buzonReincidenciaForm',compact('denuncia'));
    }

    public function buzonReincidenciaStore(Request $request)
    {
        // Validamos los datos que vienen desde el formulario
        $request->validate([
            'captcha' => 'required|captcha',
            'descripcion'=>'required|string',
            'archivo' => 'file|mimes:jpg,jpeg,png,mp4,mp3,pdf,doc,docx,|max:10240',
        ],[
            'archivo.mimes' => 'El archivo debe ser de tipo jpg,jpeg,png,mp4,mp3,pdf,doc,docx,.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 10MB.',
            'captcha.required' => 'El captcha es obligatorio.',
            'captcha.captcha' => 'El captcha ingresado es incorrecto.',
        ]);
        
        // Traemos las variables ocultas en el codigo
        $id_denuncia = $request->input('id_denuncia');
        $id = $id_denuncia;

        $folio = $request->input('folio');

        // Asignamos el valor cuando la reincidencia viene desde el formulario
        $responsable = 9999;

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        // Crear el nombre del archivo con la fecha y hora
        $archivoNombre = $folio . '_R_' . $timestamp . '.' . $request->archivo->extension();

        // Almacenar el archivo en la carpeta 'documents' en el almacenamiento local
        $archivoPath = $request->archivo->storeAs('documents/reincidencia', $archivoNombre, 'local');

        // Creamos el objeto y vamos asignando valores a cada campo de la tabla
        $reincidencia=new DenunciaReincidencia();

        $reincidencia->id_denuncia = $id_denuncia;
        $reincidencia->descripcion = $request->descripcion;
        $reincidencia->responsable = $responsable;
        $reincidencia->archivo = $archivoPath;

        // Guardamos el registros en la base de datos
        $reincidencia->save();

        // Enviamos email de notificacion
        //Mail::to('cesartorres.1688@gmail.com')->send(new DenunciaReincidenciaMail($folio));

        // Consultamos los datos de la denuncia principal
        $denuncia = Denuncia::find($id_denuncia);

        // Enviamos el correo de notificacion
        $emails = User::where('notificacion', 1)
              ->pluck('email')
              ->toArray();

        // Eliminar duplicados por si acaso
        $emails = array_unique($emails);

        // Enviamos el email
        Mail::to($emails)->send(new DenunciaReincidenciaMail($folio, $id));

        //-----------------------------------------------------------------------------------------------------------

            // Enviamos mensajes por TELEGRAM
            $token = env('TELEGRAM_BOT_TOKEN');

            // Buscamos los registros que tengan el campo chat_id lleno
            $chat_ids = User::whereNotNull('chat_id')
                ->pluck('chat_id')
                ->toArray();

            // Creamos el mensaje
            $mensaje = '👥 Programa de Igualdad de Género' . "\n" .
                        "\n" .
                        '🚨 Se ha registrado una reincidencia' . "\n" .
                        '📝 Folio: HAS/SSC/2025/' . $folio . "\n";

            // Recorrimos el arreglo y mandamos los mensajes
            foreach ($chat_ids as $chat_id) 
            {
                $response = Http::withOptions([
                    'verify' => false, // Desactiva verificación SSL (útil para pruebas locales)
                ])->post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => $mensaje,
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [[
                            [
                                'text' => '🔗 Ver denuncia',                                
                                'url' => url('admin/'.$id.'/detalles')
                            ]
                            
                        ]]
                    ]),
                ]);

                // Puedes revisar cada respuesta si gustas
                //dump("Mensaje enviado a {$chat_id}", $response->json());
            }

        // Redireccionamos al formulario con el mensaje de exito
        return redirect()->route('buzonReincidencia')->with('reincidencia', 'La reincidencia se registro correctamente en el folio : HAS/SSC/2025/'.$folio);         
    }

}