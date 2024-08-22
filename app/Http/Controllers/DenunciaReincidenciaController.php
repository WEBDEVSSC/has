<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaReincidenciaMail;
use App\Models\Denuncia;
use App\Models\DenunciaReincidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Exception;
use Illuminate\Support\Facades\Crypt;

class DenunciaReincidenciaController extends Controller
{
    
    public function download($filename)
    {
        $filePath = storage_path('app/documents/' . $filename);

        if (file_exists($filePath)) 
        {
            return response()->download($filePath);
        } 
        else 
        {
            return redirect()->back()->with('error', 'Archivo no encontrado');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
         // Encuentra la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        // Obtén los registros de denuncia_reincidencia que coincidan con if_folio
        $reincidencias = DenunciaReincidencia::where('id_denuncia', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Pasa los datos a la vista
        return view('reincidencia', [
            'denuncia' => $denuncia,
            'reincidencias' => $reincidencias,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validar los datos recibidos y personalizar los mensajes de error
         $request->validate([
            'descripcion' => 'required|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:10240', // Ejemplo de validación para archivos PDF, DOC y DOCX de hasta 2MB
            'responsable' => 'required|integer|max:255',
        ], [
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'archivo.required' => 'Debe seleccionar un archivo para subir.',
            'archivo.mimes' => 'El archivo debe ser de tipo PDF, DOC o DOCX.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 10 MB.',
        ]);

        $denuncia = $id;
        $descripcion = $request->input('descripcion');
        $archivo = $request->file('archivo');
        $responsable =$request->input('responsable');

        // Consultamos el correo de esa denuncia
        $correo = Denuncia::find($denuncia)->correo;

        // Descodificamos el correo para que pueda funcionar
        $correoDeCrypt = Crypt::decryptString($correo);

        // Consultamos el folio para enviarlo a la vista del correo
        $folio = Denuncia::find($denuncia)->folio;

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        // Crear el nombre del archivo con la fecha y hora
        $archivoNombre = $denuncia . '_R_' . $timestamp . '.' . $archivo->extension();

        // Almacenar el archivo en la carpeta 'documents' en el almacenamiento local
        $archivoPath = $archivo->storeAs('documents', $archivoNombre, 'local');

        //Guardar la información del archivo en la base de datos
        $registro = new DenunciaReincidencia();
        $registro->id_denuncia = $denuncia;        
        $registro->descripcion = $descripcion;
        $registro->archivo = $archivoPath;
        $registro->responsable = $responsable;
    
        // Guardamos el registro en la DB
        $registro->save();

        // Llamamos las librerias necesarias para enviar un correo y se configura en el metodo build de DenunciaReincidenciaMail
        Mail::to(['cesartorres.1688@gmail.com',$correoDeCrypt])->send(new DenunciaReincidenciaMail($folio));

        // Redireccionamos a la vista con el mensaje

        return redirect()->route('reincidencia.create',['id' => $denuncia])->with('reincidencia', 'La reincidencia se registro correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
