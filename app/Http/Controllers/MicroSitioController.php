<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaNuevaMail;
use App\Models\Denuncia;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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
            'cual' => 'required|string|max:255',
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
        ],[
            'archivo.required' => 'Debe seleccionar un archivo para subir.',
            'archivo.mimes' => 'El archivo debe ser de tipo jpg,jpeg,png,mp4,mp3,pdf,doc,docx,.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 10MB.',
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

        // Ciframos los datos sensibles

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

        // Guardar la denuncia en la base de datos
        $denuncia->save();

        // Enviamos el correo de confirmacion
        Mail::to(['cesartorres.1688@gmail.com'])->send(new DenunciaNuevaMail($folio));
        //Mail::to(['cesartorres.1688@gmail.com', 'igualdadcoahuila@gmail.com'])->send(new DenunciaNuevaMail($folio));

        //return redirect()->route('denuncias.nuevas')->with('success', 'La denuncia se registró correctamente con el folio: ' . $folio);

        // Redirigir a la vista de detalles con los datos recién registrados
        return redirect()->route('buzonDenuncia')->with('success', 'La denuncia se registro correctamente con el folio : HAS/SSC/'.$folio);         
        
    }
}