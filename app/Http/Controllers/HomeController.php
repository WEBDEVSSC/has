<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Municipio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener todos los registros de la tabla denuncia
        $denunciasNuevas = Denuncia::where('status', 'NUEVO')->get();

        // Contar el número de registros
        $totalDenunciasNuevas = $denunciasNuevas->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasEnProceso = Denuncia::where('status', 'EN PROCESO')->get();

        // Contar el número de registros
        $totalDenunciasEnProceso = $denunciasEnProceso->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasAtendidas = Denuncia::where('status', 'ATENDIDA')->get();

        // Contar el número de registros
        $totalDenunciasAtendidas = $denunciasAtendidas->count();
        
        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->first();

         // Inicializar variables
         $idMunicipio = null;
         $cantidadRepeticiones = 0;
         $municipio = null;

        // Verificar si se encontró algún resultado
        if ($resultado) {
            $idMunicipio = $resultado->id_municipio;
            $cantidadRepeticiones = $resultado->count;

            // Buscar el nombre del municipio
            $municipioRecord = Municipio::find($idMunicipio);
            if ($municipioRecord) {
                $municipio = $municipioRecord->nombre;
            }
        }

        //RESULTADO DE 2 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_dos = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->skip(1)->take(1)->first();

         // Inicializar variables
         $idMunicipio_dos = null;
         $cantidadRepeticiones_dos = 0;
         $municipio_dos = null;

        // Verificar si se encontró algún resultado
        if ($resultado_dos) {
            $idMunicipio_dos = $resultado_dos->id_municipio;
            $cantidadRepeticiones_dos = $resultado_dos->count;

            // Buscar el nombre del municipio
            $municipioRecord_dos = Municipio::find($idMunicipio_dos);
            if ($municipioRecord_dos) {
                $municipio_dos = $municipioRecord_dos->nombre;
            }
        }

        //RESULTADO DE 3 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_tres = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->skip(2)->take(2)->first();

         // Inicializar variables
         $idMunicipio_tres = null;
         $cantidadRepeticiones_tres = 0;
         $municipio_tres = null;

        // Verificar si se encontró algún resultado
        if ($resultado_tres) {
            $idMunicipio_tres = $resultado_tres->id_municipio;
            $cantidadRepeticiones_tres = $resultado_tres->count;

            // Buscar el nombre del municipio
            $municipioRecord_tres = Municipio::find($idMunicipio_tres);
            if ($municipioRecord_tres) {
                $municipio_tres = $municipioRecord_tres->nombre;
            }
        }

        //RESULTADO DE 4 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_cuatro = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->skip(3)->take(3)->first();

         // Inicializar variables
         $idMunicipio_cuatro = null;
         $cantidadRepeticiones_cuatro = 0;
         $municipio_cuatro = null;

        // Verificar si se encontró algún resultado
        if ($resultado_cuatro) {
            $idMunicipio_cuatro = $resultado_cuatro->id_municipio;
            $cantidadRepeticiones_cuatro = $resultado_cuatro->count;

            // Buscar el nombre del municipio
            $municipioRecord_cuatro = Municipio::find($idMunicipio_cuatro);
            if ($municipioRecord_cuatro) {
                $municipio_cuatro = $municipioRecord_cuatro->nombre;
            }
        }

        //RESULTADO DE 5 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_cinco = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->skip(4)->take(4)->first();

         // Inicializar variables
         $idMunicipio_cinco = null;
         $cantidadRepeticiones_cinco = 0;
         $municipio_cinco = null;

        // Verificar si se encontró algún resultado
        if ($resultado_cinco) {
            $idMunicipio_cinco = $resultado_cinco->id_municipio;
            $cantidadRepeticiones_cinco = $resultado_cinco->count;

            // Buscar el nombre del municipio
            $municipioRecord_cinco = Municipio::find($idMunicipio_cinco);
            if ($municipioRecord_cinco) {
                $municipio_cinco = $municipioRecord_cinco->nombre;
            }
        }

        // CONSULTAS DEL TOTAL DE REGISTROS POR MES

        // Obtener todos los registros del mes de enero que están en el campo created_ad
        $denunciasEnero = Denuncia::whereMonth('created_at', 8) // Filtrar por el mes de enero (1 es enero)
        ->whereYear('created_at', date('Y'))  // Filtrar por el año actual (opcional)
        ->get();

        // Contar el número de registros
        $totalDenunciasEnero = $denunciasEnero->count();


        return view('home', compact(
            'totalDenunciasNuevas',
            'totalDenunciasEnProceso',
            'totalDenunciasAtendidas',
            'municipio',
            'cantidadRepeticiones',
            'municipio_dos',
            'cantidadRepeticiones_dos',
            'municipio_tres',
            'cantidadRepeticiones_tres',
            'municipio_cuatro',
            'cantidadRepeticiones_cuatro',
            'municipio_cinco',
            'cantidadRepeticiones_cinco',
            'denunciasEnero',
            'totalDenunciasEnero'
        ));
    }
}
