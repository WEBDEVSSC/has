<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\DenunciaDocumentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DenunciaDocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        // Consulta la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        // Obtén los registros de denuncia_reincidencia que coincidan con if_folio
        $documentos = DenunciaDocumentacion::where('id_denuncia', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Retorna la vista con los datos de la denuncia
        return view('documento', [
            'denuncia' => $denuncia,
            'documentos' => $documentos,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
         // Validar los datos recibidos y personalizar los mensajes de error
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:2048', // Ejemplo de validación para archivos PDF, DOC y DOCX de hasta 2MB
            'responsable' => 'required|integer|max:255',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'archivo.required' => 'Debe seleccionar un archivo para subir.',
            'archivo.mimes' => 'El archivo debe ser de tipo PDF, DOC o DOCX.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 2MB.',
        ]);

        $denuncia = $id;
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $archivo = $request->file('archivo');
        $responsable =$request->input('responsable');

        // Consultamos el folio para enviarlo a la vista 

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        // Crear el nombre del archivo con la fecha y hora
        $archivoNombre = $denuncia . '_D_' . $timestamp . '.' . $archivo->extension();

        // Almacenar el archivo en la carpeta 'documents' en el almacenamiento local
        $archivoPath = $archivo->storeAs('documents', $archivoNombre, 'local');

        //CREAMOS

        $registro = new DenunciaDocumentacion();
        $registro->id_denuncia = $denuncia;        
        $registro->descripcion = $descripcion;
        $registro->archivo = $archivoPath; // Guarda el nombre del archivo en la base de datos
        $registro->nombre = $nombre;
        $registro->responsable = $responsable;
        
        $registro->save();

        //return view('denuncias.detalles',['denuncia' => $denuncia])->with('success', 'Estado de la denuncia actualizado exitosamente.');

        return redirect()->route('denuncias.detalles',['id' => $denuncia])->with('success', 'Registro realizado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DenunciaDocumentacion $denunciaDocumentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DenunciaDocumentacion $denunciaDocumentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DenunciaDocumentacion $denunciaDocumentacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DenunciaDocumentacion $denunciaDocumentacion)
    {
        //
    }
}
