<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DenunciaController extends Controller
{
    /**
     * MUESTRA LOS REGISTROS NUEVOS
     */
    public function nuevas()
    {
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::where('status', 'NUEVO')->get();
        
        // Contar el número de registros
        $totalDenuncias = $denuncias->count();

        // Desencriptar el valor "nombre" para cada denuncia
        $denuncias->transform(function ($denuncia) {
            $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
            return $denuncia;
        });

        // Pasar los registros a una vista para mostrarlos
        return view('nuevas', compact('denuncias', 'totalDenuncias'));
    }

    /**
     * MUESTRA LOS REGISTROS EN PROCESO
     */
    public function enproceso()
    {
        // Obtener todos los registros de la tabla denuncia
        $denuncias = Denuncia::where('status', 'EN PROCESO')->get();

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

        // Desencriptar el valor "nombre" para cada denuncia
        $denuncias->transform(function ($denuncia) {
            $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
            return $denuncia;
        });

        // Pasar los registros a una vista para mostrarlos
        return view('total', compact('denuncias', 'totalDenuncias'));
    }

    /**
     * NOS ENVIA AL FORMULARIO DE REGISTRO MANUAL
     */
    public function formulario()
    {
         // Obtén todos los registros de la tabla entidad
         $municipios = Municipio::all();

         // Pasa los datos a la vista
         //return view('formulario', compact('entidades'));

         // Pasar los datos a la vista
        return view('formulario', [
            'municipios' => $municipios,
            'selectedMunicipio' => old('municipio')
        ]);
    }

    public function formularioPublico()
    {
         // Obtén todos los registros de la tabla entidad
         $municipios = Municipio::orderBy('nombre', 'asc')->get();

         // Pasa los datos a la vista
         //return view('formulario', compact('entidades'));

         // Pasar los datos a la vista
        // Pasa los datos a la vista
        return view('micrositio.buzonDenuncia', [
        'municipios' => $municipios,
        'selectedMunicipio' => old('municipio')
    ]);

        //return redirect()->route('buzon.denuncia', ['municipios' => $municipios, 'selectedMunicipio' => old('municipio')]);         

    }

    /**
     * NOS ENVIA AL FORMULARIO DE REGISTRO MANUAL
     */
    public function formularioregistra(Request $request)
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
            'archivo' => 'file|mimes:jpg,jpeg,png,mp4,mp3,pdf,doc,docx,|max:10240',
        ],[
            'archivo.required' => 'Debe seleccionar un archivo para subir.',
            'archivo.mimes' => 'El archivo debe ser de tipo jpg,jpeg,png,mp4,mp3,pdf,doc,docx,.',
            'archivo.max' => 'El tamaño máximo permitido para el archivo es de 10MB.',
        ]);

        //GENERAMOS EL RANDOM PARA FOLIO
        $folio = '';
        for ($i = 0; $i < 4; $i++) {
            $folio .= mt_rand(0, 9); // Concatena un número aleatorio entre 0 y 9
        }

        //$archivo = $request->file('archivo');
        
        // Configuracion para manipular el archivo

        // Obtener la fecha y hora actual en el formato deseado
        $timestamp = now()->format('Ymd_His');

        // Crear el nombre del archivo con la fecha y hora
        //$archivoNombre = $denuncia . '_R_' . $timestamp . '.' . $archivo->extension();

        // Almacenar el archivo en la carpeta 'documents' en el almacenamiento local
        $archivoPath = $request->archivo->store('documents','local');

        // Crear una nueva instancia del modelo Denuncia y asignar los valores
        $denuncia = new Denuncia();
        $denuncia->nombre = $request->nombre;
        $denuncia->edad = $request->edad;
        $denuncia->sexo = $request->sexo;
        $denuncia->correo = $request->correo;
        $denuncia->celular = $request->celular;
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
        $denuncia->denunciado_nombre = $request->denunciado_nombre;
        $denuncia->denunciado_cargo = $request->denunciado_cargo;
        $denuncia->denunciado_puesto = $request->denunciado_puesto;
        $denuncia->denunciado_antecedentes = $request->denunciado_antecedentes;
        $denuncia->testigos = $request->testigos;
        $denuncia->imagenuno = $archivoPath;

        $denuncia->status = 'NUEVO';
        $denuncia->folio = $folio;      

        // Guardar la denuncia en la base de datos
        $denuncia->save();

        //return redirect()->route('denuncias.nuevas')->with('success', 'La denuncia se registró correctamente con el folio: ' . $folio);

          // Redirigir a la vista de detalles con los datos recién registrados
          return redirect()->route('denuncias.detalles', ['id' => $denuncia->id])->with('success', 'La denuncia se registro correctamente con el folio : '.$folio);         
        
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

         // Desencriptar los campos
        $denuncia->nombre = Crypt::decryptString($denuncia->nombre);
        $denuncia->correo = Crypt::decryptString($denuncia->correo);
        $denuncia->celular = Crypt::decryptString($denuncia->celular);
        $denuncia->denunciado_nombre = Crypt::decryptString($denuncia->denunciado_nombre);
        $denuncia->testigos = Crypt::decryptString($denuncia->testigos);

        // Retorna la vista con los datos de la denuncia
        return view('detalles', ['denuncia' => $denuncia]);
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
