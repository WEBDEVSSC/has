<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaNuevaMail;
use App\Mail\DenunciaReincidenciaMail;
use App\Models\Denuncia;
use App\Models\DenunciaReincidencia;
use App\Models\DenunciaSeguimiento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MicroSitioController extends Controller
{
    //

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

    public function directorio()
    {
        // Aquí puedes agregar lógica adicional si la necesitas
        return view('micrositio.directorio');
    }

    /*
    *
    *
    * BUZON DE DENUNCIAS
    *
    */

    public function buzon()
    {
        // Obtén todos los registros de la tabla entidad
        $municipios = Municipio::orderBy('nombre', 'asc')->get();

        return view('micrositio.buzonDenuncia', [
        'municipios' => $municipios,
        'selectedMunicipio' => old('municipio')
        ]);
    }    

    public function buzonStore(Request $request)
    {
        $municipio = Municipio::find($request->id_municipio)->nombre;
        $jurisdiccion = Municipio::find($request->id_municipio)->jurisdiccion;
        
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|numeric|max:60',
            'sexo' => 'required|string',
            'correo' => 'required|email',
            'celular' => 'required|string|max:10|min:10',
            'adscripcion' => 'required|string|max:255',
            'unidad_responsable' => 'required|string|max:255',
            'id_municipio' => 'required|integer',
            'tipo_contratacion' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'vulnerabilidad' => 'required|string|max:255',
            'cual' => 'string|max:255',
            'tipo_solicitud' => 'required|string|max:255',
            'como' => 'required|string|max:10000',
            'cuando' => 'required|string|max:10000',
            'donde' => 'required|string|max:10000',
            'denunciado_nombre' => 'required|string|max:255',
            'denunciado_cargo' => 'required|string|max:255',
            'denunciado_puesto' => 'required|string|max:255',
            'denunciado_antecedentes' => 'required|string|max:10000',
            'testigos' => 'required|string|max:10000',
            'evidencia_uno' => 'file|mimes:jpg,jpeg,png,mp4,mp3,pdf,doc,docx,|max:10240',
            'evidencia_dos' => 'file|mimes:jpg,jpeg,png,mp4,mp3,pdf,doc,docx,|max:10240',
        ], [
            'evidencia_uno.required' => 'Debe seleccionar un archivo para la primera evidencia.',
            'evidencia_uno.mimes' => 'El archivo de la primera evidencia debe ser de tipo: jpg, jpeg, png, mp4, mp3, pdf, doc, docx.',
            'evidencia_uno.max' => 'El tamaño máximo permitido para la primera evidencia es de 10MB.',
            'evidencia_dos.required' => 'Debe seleccionar un archivo para la segunda evidencia.',
            'evidencia_dos.mimes' => 'El archivo de la segunda evidencia debe ser de tipo: jpg, jpeg, png, mp4, mp3, pdf, doc, docx.',
            'evidencia_dos.max' => 'El tamaño máximo permitido para la segunda evidencia es de 10MB.',
        ]);

        //GENERAMOS EL RANDOM PARA FOLIO
        $folio = '';

        for ($i = 0; $i < 4; $i++) 
        {
            $folio .= mt_rand(0, 9); // Concatena un número aleatorio entre 0 y 9
        }
        
        // Configuracion para manipular el archivo

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

         // Cifra el los datos sensibles
        $encryptedNombre = Crypt::encryptString($request->input('nombre'));
        $encryptedCelular = Crypt::encryptString($request->input('celular'));
        $encryptedCorreo = Crypt::encryptString($request->input('correo'));
        $encryptedDenunciadoNombre = Crypt::encryptString($request->input('denunciado_nombre'));
        $encryptedTestigos = Crypt::encryptString($request->input('testigos'));

        // Crear el nombre del archivo con la fecha y hora
        //$archivoNombre = $denuncia . '_R_' . $timestamp . '.' . $archivo->extension();

        // Almacenar los archivos en la carpeta 'documents' en el almacenamiento local
        $archivoPathUno = $request->hasFile('evidencia_uno') ? $request->file('evidencia_uno')->store('documents', 'local') : null;
        $archivoPathDos = $request->hasFile('evidencia_dos') ? $request->file('evidencia_dos')->store('documents', 'local') : null;

        // Crear una nueva instancia del modelo Denuncia y asignar los valores
        $denuncia = new Denuncia();
        $denuncia->nombre = $encryptedNombre;
        $denuncia->edad = $request->edad;
        $denuncia->sexo = $request->sexo;
        $denuncia->correo = $encryptedCorreo;
        $denuncia->celular =  $encryptedCelular;
        $denuncia->adscripcion = $request->adscripcion;
        $denuncia->unidad_resposable = $request->unidad_responsable;
        $denuncia->id_municipio = $request->id_municipio;
        $denuncia->municipio = $municipio;
        $denuncia->tipo_contratacion = $request->tipo_contratacion;
        $denuncia->cargo = $request->cargo;
        $denuncia->vulnerabilidad = $request->vulnerabilidad;
        $denuncia->cual = $request->cual;
        $denuncia->tipo_solicitud = $request->tipo_solicitud;
        $denuncia->como = $request->como;
        $denuncia->cuando = $request->cuando;
        $denuncia->donde = $request->donde;
        $denuncia->tipo_solicitud = $request->tipo_solicitud;
        $denuncia->denunciado_nombre = $encryptedDenunciadoNombre;
        $denuncia->denunciado_cargo = $request->denunciado_cargo;
        $denuncia->denunciado_puesto = $request->denunciado_puesto;
        $denuncia->denunciado_antecedentes = $request->denunciado_antecedentes;
        $denuncia->testigos = $encryptedTestigos;
        $denuncia->imagenuno = $archivoPathUno;
        $denuncia->imagendos = $archivoPathDos;

        $denuncia->status = 'NUEVO';
        $denuncia->folio = $folio;  
        $denuncia->jurisdiccion = $jurisdiccion;

        // Guardar la denuncia en la base de datos
        $denuncia->save();

        // Enviamos el correo de confirmacion
        Mail::to(['cesartorres.1688@gmail.com','igualdadcoahuila@gmail.com',$request->correo])->send(new DenunciaNuevaMail($folio));

        // Redirigir a la vista de detalles con los datos recién registrados
        return redirect()->route('buzonDenuncia')->with('success', 'La denuncia se registro correctamente con el folio : HAS/SSC/'.$folio);         

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
        
         // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'folio' => 'required|digits:4',
        ], [
            'folio.required' => 'El número de folio es obligatorio.',
            'folio.digits' => 'El folio debe ser un número de exactamente 4 dígitos.',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) 
        {
            return redirect()->route('buzonSeguimiento')
                            ->withErrors($validator)
                            ->withInput();
        }

        // Capturamos el folio
        $folio = $request->input('folio');

        // Busca la denuncia por el folio
        $denuncia = Denuncia::where('folio', $folio)->first();   
        
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
        // Buscamos el id que corresponda a ese folio y lo almacenamos en id_denuncia

        $denuncia = Denuncia::where('folio', $request->folio)->first();   

        $id_denuncia = $denuncia->id;
        
        // Pasamos el id_denuncia al formulario para realizar un registro
        
        return view('micrositio.buzonReincidenciaForm',['id_denuncia'=>$id_denuncia,'folio'=>$request->folio]);
    }

    public function buzonReincidenciaStore(Request $request)
    {
        // Traemos las variables ocultas en el codigo
        $folio = $request->input('folio');
        $id_denuncia = $request->input('id_denuncia');

        // Asignamos el valor cuando la reincidencia viene desde el formulario
        $responsable = 9999;

        // Consultamos los datos con el numero de id de la denuncia
        $datosDenuncia = Denuncia::where('id', $id_denuncia)->first();   

        // Traemos el correo y lo desencriptamos
        $correoDeCrypt = Crypt::decryptString($datosDenuncia->correo);        

        // Validamos los datos que vienen desde el formulario
        $request->validate([
            'descripcion'=>'required|string',
            'archivo' => 'file|mimes:jpg,jpeg,png,mp4,mp3,pdf,doc,docx,|max:10240',
        ],[
            'archivo.mimes' => 'El archivo debe ser de tipo jpg,jpeg,png,mp4,mp3,pdf,doc,docx,.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 10MB.',
        ]);

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        // Creamos el pad para guardar el archivo y renombrarlo
        $archivoPath = $request->hasFile('archivo') ? $request->file('archivo')->store('documents', 'local') : null;

        // Creamos el objeto y vamos asignando valores a cada campo de la tabla
        $reincidencia=new DenunciaReincidencia();
        $reincidencia->id_denuncia = $id_denuncia;
        $reincidencia->descripcion = $request->descripcion;
        $reincidencia->responsable = $responsable;
        $reincidencia->archivo = $archivoPath;

        // Guardamos el registros en la base de datos
        $reincidencia->save();

        // Enviamos email de notificacion
        Mail::to(['cesartorres.1688@gmail.com','igualdadcoahuila.gob.mx',$correoDeCrypt])->send(new DenunciaReincidenciaMail($folio));

        // Redireccionamos al formulario con el mensaje de exito
        return redirect()->route('buzonReincidencia')->with('reincidencia', 'La reincidencia se registro correctamente en el folio : HAS/SSC/'.$folio);         
    }

}