<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaNuevaMail;
use App\Models\Clue;
use App\Models\Denuncia;
use App\Models\DenunciaDocumentacion;
use App\Models\DenunciaReincidencia;
use App\Models\DenunciaSeguimiento;
use App\Models\Municipio;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class DenunciaController extends Controller
{
    
    public function generarPDF($id)
    {
        
        // Consultamos los datos de la denuncia

        $denuncia = Denuncia::find($id);

        // Decodificamos los campos
        $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
        $denuncia->correo = Crypt::decryptString($denuncia->correo);
        $denuncia->celular = Crypt::decryptString($denuncia->celular);
        $denuncia->denunciado_nombre = Crypt::decryptString($denuncia->denunciado_nombre);
        $denuncia->testigos = Crypt::decryptString($denuncia->testigos);

        // Renderizar la vista y generar el PDF
        $pdf = PDF::loadView('pdf.reporte', ['denuncia' => $denuncia])->setPaper('a4', 'landscape');;

        // Descargar el archivo PDF
        return $pdf->stream('reporte.pdf');
        
    }
    
    /**
     * MUESTRA LOS REGISTROS NUEVOS
     */
    public function nuevas()
    {
        
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::where('status', 'NUEVO')
                    ->whereYear('created_at', now()->year)
                    ->get();
        
        // Contar el número de registros
        $totalDenuncias = $denuncias->count();

        // Pasar los registros a una vista para mostrarlos
        return view('nuevas', compact('denuncias', 'totalDenuncias',));
    }

    /**
     * MUESTRA LOS REGISTROS EN PROCESO
     */
    public function enproceso()
    {
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::where('status', 'EN PROCESO')
                    ->whereYear('created_at', now()->year)
                    ->get();

        // Contar el número de registros
        $totalDenuncias = $denuncias->count();

        // Desencriptar el valor "nombre" para cada denuncia
        $denuncias->transform(function ($denuncia) {
            $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
            return $denuncia;
        });

        // Pasar los registros a una vista para mostrarlos
        return view('enproceso', compact('denuncias', 'totalDenuncias'));
    }

    /**
     * MUESTRA LOS REGISTROS ATENDIDOS
     */
    public function atendidas()
    {
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::where('status', 'ATENDIDA')->get();

        // Contar el número de registros
        $totalDenuncias = $denuncias->count();

        // Desencriptar el valor "nombre" para cada denuncia
        $denuncias->transform(function ($denuncia) {
            $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
            return $denuncia;
        });

        // Pasar los registros a una vista para mostrarlos
        return view('atendidas', compact('denuncias', 'totalDenuncias'));
    }

    /**
     * MUESTRA TODOS LOS REGISTROS
     */
    public function total()
    {
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::all();

        // Contar el número de registros
        $totalDenuncias = $denuncias->count();

        // Pasar los registros a una vista para mostrarlos
        return view('total', compact('denuncias', 'totalDenuncias'));
    }

    /**
     * NOS ENVIA AL FORMULARIO DE REGISTRO MANUAL
     */
    public function formulario()
    {
         // Consultamos todas las CLUES
        $clues = Clue::all();

         // Pasa los datos a la vista
         //return view('formulario', compact('entidades'));

         // Pasar los datos a la vista
        return view('formulario', compact('clues'));
    }

    

        

    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 
     * 
     * STATUS DE LA DENUNCIA
     * 
     * 
     */

    /**
     * MUESTRA LA VISTA CON EL FORMULARIO PARA ACTUALIZAR STATUS
     */
    public function status(string $id)
    {
         // Consulta la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        // Retorna la vista con los datos de la denuncia
        return view('status', ['denuncia' => $denuncia]);
    }

    /**
     * RECIBE LOS DATOS Y ACTUALIZA EL STATUS EN LA DB
     */

    public function update(Request $request, string $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'status' => 'required|string|in:NUEVO,EN PROCESO,ATENDIDA',
        ]);

        // Obtener el valor del status y el ID del registro
        $status = $request->input('status');
        $id_registro = $request->input('id_registro');

        // Buscar la denuncia en la base de datos por ID
        $denuncia = Denuncia::find($id_registro);

        // Verificar si la denuncia existe
        if (!$denuncia) {
            return redirect()->back()->withErrors(['error' => 'Denuncia no encontrada.']);
        }

        // Actualizar el campo status de la denuncia
        $denuncia->status = $status;

        // Guardar los cambios en la base de datos
        $denuncia->save(); 

        // Redirigir con un mensaje de éxito
        return redirect()->route('denuncias.detalles', ['id' => $denuncia->id])->with('status', 'Estado de la denuncia actualizado exitosamente');         

    }

    /**
     * 
     * 
     * STATUS DE LA DENUNCIA
     * 
     * 
     */

    /**
     * MUESTRA LA VISTA CON EL FORMULARIO PARA ACTUALIZAR SEGUIMIENTO
     */
    public function seguimiento(string $id)
    {
        // Consulta la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        // Retorna la vista con los datos de la denuncia
        return view('seguimiento', ['denuncia' => $denuncia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function seguimientoupdate(Request $request)
    {
        // Valida la solicitud
        $validated = $request->validate([
            'id' => 'required|integer',
            'mensaje' => 'required|string|max:255',
        ]);

        // Crea un nuevo registro en la base de datos
        $denuncia = DenunciaController::create([
            'id' => $validated['id'],
            'mensaje' => $validated['mensaje'],
        ]);

        // Opcional: Puedes redirigir o devolver una respuesta
        //return response()->json($denuncia, 201);

        //return redirect()->route('denuncias.detalles', ['id' => $denuncia->id])->with('status', 'Estado de la denuncia actualizado exitosamente');         

    }

    /**
     * MUESTRA LA VISTA CON LOS DETALLES DEL REGISTRO
     */
    public function detalles(string $id)
    {
        // Consulta la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        //Consultamos todos los seguimientos que tiene esa denuncia
        $seguimientos = DenunciaSeguimiento::where('relacion',$id)->orderBy('id','desc')->get();

        //Consultamos todos las reincidencias que tiene esa denuncia
        $reincidencias = DenunciaReincidencia::where('id_denuncia',$id)->orderBy('id','desc')->get();

        //Consultamos toda la documentacion que tiene esa denuncia
        $documentaciones = DenunciaDocumentacion::where('id_denuncia',$id)->orderBy('id','desc')->get();

        // Retorna la vista con los datos de la denuncia
        return view('detalles', [
            'denuncia' => $denuncia,
            'seguimientos' => $seguimientos,
            'reincidencias' => $reincidencias,
            'documentaciones' => $documentaciones
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
