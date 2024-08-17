<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

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

        $request -> validate([
            
        ]);
    }
}