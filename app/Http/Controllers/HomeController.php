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
        $denunciasNuevas = Denuncia::where('status', 'NUEVO')
                            ->whereYear('created_at', 2024)
                            ->get();

        // Contar el número de registros
        $totalDenunciasNuevas = $denunciasNuevas->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasEnProceso = Denuncia::where('status', 'EN PROCESO')
                            ->whereYear('created_at', 2024)
                            ->get();

        // Contar el número de registros
        $totalDenunciasEnProceso = $denunciasEnProceso->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasAtendidas = Denuncia::where('status', 'ATENDIDA')
                            ->whereYear('created_at', 2024)
                            ->get();

        // Contar el número de registros
        $totalDenunciasAtendidas = $denunciasAtendidas->count();

        /*
        *
        *
        // CONSULTAS LOS MUNICIPIOS CON MAS DENUNCIAS
        *
        *
        */
        
        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado = Denuncia::select('id_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('id_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', 2024)
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
            ->whereYear('created_at', 2024)
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
            ->whereYear('created_at', 2024)
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
            ->whereYear('created_at', 2024)
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
            ->whereYear('created_at', 2024)
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

        /*
        *
        *
        // CONSULTAS DEL TOTAL DE REGISTROS POR MES
        *
        *
        */

        // ENERO
        $año = 2024;

        $denunciasEnero = Denuncia::whereMonth('created_at', 1)
            ->whereYear('created_at', $año)
            ->get();

        $totalDenunciasEnero = $denunciasEnero->count();

        //FEBRERO
        $denunciasFebrero = Denuncia::whereMonth('created_at', 2) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasFebrero = $denunciasFebrero->count();

        //MARZO
        $denunciasMarzo = Denuncia::whereMonth('created_at', 3) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasMarzo = $denunciasMarzo->count();

        //ABRIL
        $denunciasAbril = Denuncia::whereMonth('created_at', 4) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasAbril = $denunciasAbril->count();

        //MAYO
        $denunciasMayo = Denuncia::whereMonth('created_at', 5) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasMayo = $denunciasMayo->count();

        //JUNIO
        $denunciasJunio = Denuncia::whereMonth('created_at', 6) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasJunio = $denunciasJunio->count();

        //JULIO
        $denunciasJulio = Denuncia::whereMonth('created_at', 7) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasJulio = $denunciasJulio->count();

        //AGOSTO
        $denunciasAgosto = Denuncia::whereMonth('created_at', 8) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasAgosto = $denunciasAgosto->count();

        //SEPTIEMBRE
        $denunciasSeptiembre = Denuncia::whereMonth('created_at', 9) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasSeptiembre = $denunciasSeptiembre->count();

        //OCTUBRE
        $denunciasOctubre = Denuncia::whereMonth('created_at', 10) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasOctubre = $denunciasOctubre->count();

        //NOVIEMBRE
        $denunciasNoviembre = Denuncia::whereMonth('created_at', 11) 
            ->whereYear('created_at', $año) 
            ->get();

        // Contar el número de registros
        $totalDenunciasNoviembre = $denunciasNoviembre->count();

        //DICIEMBRE
        $denunciasDiciembre = Denuncia::whereMonth('created_at', 12) 
            ->whereYear('created_at', $año)
            ->get();

        // Contar el número de registros
        $totalDenunciasDiciembre = $denunciasDiciembre->count();

        /*
        *
        *
        // CONSULTAS DEL TOTAL DE REGISTROS POR SEXO
        *
        *
        */

        // Obtener todos los registros de la tabla denuncia
        $denunciasMasculino = Denuncia::where('sexo', 'MASCULINO')
                            ->whereYear('created_at', 2024)
                            ->get();

        // Contar el número de registros
        $totalDenunciasMasculino = $denunciasMasculino->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasFemenino = Denuncia::where('sexo', 'FEMENINO')
                            ->whereYear('created_at', 2024)
                            ->get();

        // Contar el número de registros
        $totalDenunciasFemenino = $denunciasFemenino->count();

        /*
        *
        *
        // CONSULTAS DEL TOTAL DE REGISTROS POR JURISDICCION
        *
        *
        */

        //JURISDICCION 1

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionUno = Denuncia::where('jurisdiccion', '1')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionUno = $denunciasJurisdiccionUno->count();

        //JURISDICCION 2

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionDos = Denuncia::where('jurisdiccion', '2')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionDos = $denunciasJurisdiccionDos->count();

        //JURISDICCION 3

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionTres = Denuncia::where('jurisdiccion', '3')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionTres = $denunciasJurisdiccionTres->count();

        //JURISDICCION 4

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionCuatro = Denuncia::where('jurisdiccion', '4')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionCuatro = $denunciasJurisdiccionCuatro->count();

        //JURISDICCION 5

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionCinco = Denuncia::where('jurisdiccion', '5')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionCinco = $denunciasJurisdiccionCinco->count();

        //JURISDICCION 6

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionSeis = Denuncia::where('jurisdiccion', '6')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionSeis = $denunciasJurisdiccionSeis->count();

        //JURISDICCION 7

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionSiete = Denuncia::where('jurisdiccion', '7')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionSiete = $denunciasJurisdiccionSiete->count();

        //JURISDICCION 8

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionOcho = Denuncia::where('jurisdiccion', '8')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionOcho = $denunciasJurisdiccionOcho->count();

        /*
        *
        *
        // TIPO DE DENUNCIA
        *
        *
        */

        // ACOSO SEXUAL

        // Obtener todos los registros de la tabla denuncia
        $denunciasAcosoSexual = Denuncia::where('tipo_solicitud', 'ACOSO SEXUAL')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasAcosoSexual = $denunciasAcosoSexual->count();

        // HOSTIGAMIENTO

        // Obtener todos los registros de la tabla denuncia
        $denunciasHostigamiento = Denuncia::where('tipo_solicitud', 'HOSTIGAMIENTO SEXUAL')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasHostigamiento = $denunciasHostigamiento->count();

        // OTRO

        // Obtener todos los registros de la tabla denuncia
        $denunciasOtro = Denuncia::where('tipo_solicitud', 'OTRO')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasOtro = $denunciasOtro->count();

        /*
        *
        *
        // TIPO DE CONTRATACION
        *
        *
        */

        // CONFIANZA

        // Obtener todos los registros de la tabla denuncia
        $denunciasConfianza = Denuncia::where('tipo_contratacion', 'CONFIANZA')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasConfianza = $denunciasConfianza->count();

        // BASE

        // Obtener todos los registros de la tabla denuncia
        $denunciasBase = Denuncia::where('tipo_contratacion', 'BASE')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasBase = $denunciasBase->count();
        
        // CONTRATO

        // Obtener todos los registros de la tabla denuncia
        $denunciasContrato = Denuncia::where('tipo_contratacion', 'CONTRATO')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasContrato = $denunciasContrato->count();

        // EN FORMACION

        // Obtener todos los registros de la tabla denuncia
        $denunciasEnFormacion = Denuncia::where('tipo_contratacion', 'EN FORMACION')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasEnFormacion = $denunciasEnFormacion->count();

        // OTRA

        // Obtener todos los registros de la tabla denuncia
        $denunciasOtra = Denuncia::where('tipo_contratacion', 'OTRA')
        ->whereYear('created_at', 2024)
        ->get();

        // Contar el número de registros
        $totaldenunciasOtra = $denunciasOtra->count();

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
            'totalDenunciasEnero',
            'totalDenunciasFebrero',
            'totalDenunciasMarzo',
            'totalDenunciasAbril',
            'totalDenunciasMayo',
            'totalDenunciasJunio',
            'totalDenunciasJulio',
            'totalDenunciasAgosto',
            'totalDenunciasSeptiembre',
            'totalDenunciasOctubre',
            'totalDenunciasNoviembre',
            'totalDenunciasDiciembre',
            'totalDenunciasMasculino',
            'totalDenunciasFemenino',
            'totaldenunciasJurisdiccionUno',
            'totaldenunciasJurisdiccionDos',
            'totaldenunciasJurisdiccionTres',
            'totaldenunciasJurisdiccionCuatro',
            'totaldenunciasJurisdiccionCinco',
            'totaldenunciasJurisdiccionSeis',
            'totaldenunciasJurisdiccionSiete',
            'totaldenunciasJurisdiccionOcho',
            'totaldenunciasAcosoSexual',
            'totaldenunciasHostigamiento',
            'totaldenunciasOtro',
            'totaldenunciasConfianza',
            'totaldenunciasBase',
            'totaldenunciasContrato',
            'totaldenunciasEnFormacion',
            'totaldenunciasOtra'
        ));
    }
}
