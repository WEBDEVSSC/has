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
        $anio = date('Y');
        
        // Obtener todos los registros de la tabla denuncia
        $denunciasNuevas = Denuncia::where('status', 'NUEVO')
                            ->whereYear('created_at', $anio)
                            ->get();

        // Contar el número de registros
        $totalDenunciasNuevas = $denunciasNuevas->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasEnProceso = Denuncia::where('status', 'EN PROCESO')
                            ->whereYear('created_at', $anio)
                            ->get();

        // Contar el número de registros
        $totalDenunciasEnProceso = $denunciasEnProceso->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasAtendidas = Denuncia::where('status', 'ATENDIDA')
                            ->whereYear('created_at', $anio)
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
        $resultado = Denuncia::select('clues_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('clues_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', $anio)
            ->first();

         // Inicializar variables
         $idMunicipio = null;
         $cantidadRepeticiones = 0;
         $municipio = null;

        // Verificar si se encontró algún resultado
        if ($resultado) {
            $idMunicipio = $resultado->clues_municipio;
            $cantidadRepeticiones = $resultado->count;

            // Buscar el nombre del municipio
            $municipioRecord = Municipio::find($idMunicipio);
            if ($municipioRecord) {
                $municipio = $municipioRecord->nombre;
            }
        }

        //RESULTADO DE 2 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_dos = Denuncia::select('clues_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('clues_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', $anio)
            ->skip(1)->take(1)->first();

         // Inicializar variables
         $idMunicipio_dos = null;
         $cantidadRepeticiones_dos = 0;
         $municipio_dos = null;

        // Verificar si se encontró algún resultado
        if ($resultado_dos) {
            $idMunicipio_dos = $resultado_dos->clues_municipio;
            $cantidadRepeticiones_dos = $resultado_dos->count;

            // Buscar el nombre del municipio
            $municipioRecord_dos = Municipio::find($idMunicipio_dos);
            if ($municipioRecord_dos) {
                $municipio_dos = $municipioRecord_dos->nombre;
            }
        }

        //RESULTADO DE 3 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_tres = Denuncia::select('clues_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('clues_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', $anio)
            ->skip(2)->take(2)->first();

         // Inicializar variables
         $idMunicipio_tres = null;
         $cantidadRepeticiones_tres = 0;
         $municipio_tres = null;

        // Verificar si se encontró algún resultado
        if ($resultado_tres) {
            $idMunicipio_tres = $resultado_tres->clues_municipio;
            $cantidadRepeticiones_tres = $resultado_tres->count;

            // Buscar el nombre del municipio
            $municipioRecord_tres = Municipio::find($idMunicipio_tres);
            if ($municipioRecord_tres) {
                $municipio_tres = $municipioRecord_tres->nombre;
            }
        }

        //RESULTADO DE 4 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_cuatro = Denuncia::select('clues_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('clues_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', $anio)
            ->skip(3)->take(3)->first();

         // Inicializar variables
         $idMunicipio_cuatro = null;
         $cantidadRepeticiones_cuatro = 0;
         $municipio_cuatro = null;

        // Verificar si se encontró algún resultado
        if ($resultado_cuatro) {
            $idMunicipio_cuatro = $resultado_cuatro->clues_municipio;
            $cantidadRepeticiones_cuatro = $resultado_cuatro->count;

            // Buscar el nombre del municipio
            $municipioRecord_cuatro = Municipio::find($idMunicipio_cuatro);
            if ($municipioRecord_cuatro) {
                $municipio_cuatro = $municipioRecord_cuatro->nombre;
            }
        }

        //RESULTADO DE 5 CON MAS REGISTROS

        // Obtener el id_municipio que más veces se repite usando Eloquent
        $resultado_cinco = Denuncia::select('clues_municipio')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('clues_municipio')
            ->orderBy('count', 'desc')
            ->whereYear('created_at', $anio)
            ->skip(4)->take(4)->first();

         // Inicializar variables
         $idMunicipio_cinco = null;
         $cantidadRepeticiones_cinco = 0;
         $municipio_cinco = null;

        // Verificar si se encontró algún resultado
        if ($resultado_cinco) {
            $idMunicipio_cinco = $resultado_cinco->clues_municipio;
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

        $denunciasEnero = Denuncia::whereMonth('created_at', 1)
            ->whereYear('created_at', $anio)
            ->get();

        $totalDenunciasEnero = $denunciasEnero->count();

        //FEBRERO
        $denunciasFebrero = Denuncia::whereMonth('created_at', 2) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasFebrero = $denunciasFebrero->count();

        //MARZO
        $denunciasMarzo = Denuncia::whereMonth('created_at', 3) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasMarzo = $denunciasMarzo->count();

        //ABRIL
        $denunciasAbril = Denuncia::whereMonth('created_at', 4) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasAbril = $denunciasAbril->count();

        //MAYO
        $denunciasMayo = Denuncia::whereMonth('created_at', 5) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasMayo = $denunciasMayo->count();

        //JUNIO
        $denunciasJunio = Denuncia::whereMonth('created_at', 6) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasJunio = $denunciasJunio->count();

        //JULIO
        $denunciasJulio = Denuncia::whereMonth('created_at', 7) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasJulio = $denunciasJulio->count();

        //AGOSTO
        $denunciasAgosto = Denuncia::whereMonth('created_at', 8) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasAgosto = $denunciasAgosto->count();

        //SEPTIEMBRE
        $denunciasSeptiembre = Denuncia::whereMonth('created_at', 9) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasSeptiembre = $denunciasSeptiembre->count();

        //OCTUBRE
        $denunciasOctubre = Denuncia::whereMonth('created_at', 10) 
            ->whereYear('created_at', $anio)
            ->get();

        // Contar el número de registros
        $totalDenunciasOctubre = $denunciasOctubre->count();

        //NOVIEMBRE
        $denunciasNoviembre = Denuncia::whereMonth('created_at', 11) 
            ->whereYear('created_at', $anio) 
            ->get();

        // Contar el número de registros
        $totalDenunciasNoviembre = $denunciasNoviembre->count();

        //DICIEMBRE
        $denunciasDiciembre = Denuncia::whereMonth('created_at', 12) 
            ->whereYear('created_at', $anio)
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
        $denunciasMasculino = Denuncia::where('victima_sexo', 'M')
                            ->whereYear('created_at', $anio)
                            ->get();

        // Contar el número de registros
        $totalDenunciasMasculino = $denunciasMasculino->count();

        // Obtener todos los registros de la tabla denuncia
        $denunciasFemenino = Denuncia::where('victima_sexo', 'F')
                            ->whereYear('created_at', $anio)
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
        $denunciasJurisdiccionUno = Denuncia::where('clues_jurisdiccion', '1')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionUno = $denunciasJurisdiccionUno->count();

        //JURISDICCION 2

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionDos = Denuncia::where('clues_jurisdiccion', '2')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionDos = $denunciasJurisdiccionDos->count();

        //JURISDICCION 3

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionTres = Denuncia::where('clues_jurisdiccion', '3')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionTres = $denunciasJurisdiccionTres->count();

        //JURISDICCION 4

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionCuatro = Denuncia::where('clues_jurisdiccion', '4')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionCuatro = $denunciasJurisdiccionCuatro->count();

        //JURISDICCION 5

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionCinco = Denuncia::where('clues_jurisdiccion', '5')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionCinco = $denunciasJurisdiccionCinco->count();

        //JURISDICCION 6

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionSeis = Denuncia::where('clues_jurisdiccion', '6')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionSeis = $denunciasJurisdiccionSeis->count();

        //JURISDICCION 7

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionSiete = Denuncia::where('clues_jurisdiccion', '7')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasJurisdiccionSiete = $denunciasJurisdiccionSiete->count();

        //JURISDICCION 8

        // Obtener todos los registros de la tabla denuncia
        $denunciasJurisdiccionOcho = Denuncia::where('clues_jurisdiccion', '8')
        ->whereYear('created_at', $anio)
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
        $denunciasAcosoSexual = Denuncia::where('tipo_denuncia', 'ACOSO SEXUAL')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasAcosoSexual = $denunciasAcosoSexual->count();

        // HOSTIGAMIENTO

        // Obtener todos los registros de la tabla denuncia
        $denunciasHostigamiento = Denuncia::where('tipo_denuncia', 'HOSTIGAMIENTO SEXUAL')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasHostigamiento = $denunciasHostigamiento->count();

        /*
        *
        *
        // TIPO DE CONTRATACION
        *
        *
        */

        // CONFIANZA

        // Obtener todos los registros de la tabla denuncia
        $denunciasConfianza = Denuncia::where('victima_tipo_contratacion', 'CONFIANZA')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasConfianza = $denunciasConfianza->count();

        // BASE

        // Obtener todos los registros de la tabla denuncia
        $denunciasBase = Denuncia::where('victima_tipo_contratacion', 'BASE')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasBase = $denunciasBase->count();
        
        // CONTRATO

        // Obtener todos los registros de la tabla denuncia
        $denunciasContrato = Denuncia::where('victima_tipo_contratacion', 'CONTRATO')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasContrato = $denunciasContrato->count();

        // EN FORMACION

        // Obtener todos los registros de la tabla denuncia
        $denunciasEnFormacion = Denuncia::where('victima_tipo_contratacion', 'EN FORMACION')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasEnFormacion = $denunciasEnFormacion->count();

        // OTRA

        // Obtener todos los registros de la tabla denuncia
        $denunciasOtra = Denuncia::where('victima_tipo_contratacion', 'OTRO')
        ->whereYear('created_at', $anio)
        ->get();

        // Contar el número de registros
        $totaldenunciasOtra = $denunciasOtra->count();

        // Rangos de edad

        // Primera infancia: De 0 a 5 años
        $primeraInfancia = Denuncia::whereBetween('victima_edad', [0, 5])->count();

        // Infancia: De 6 a 11 años
        $infancia = Denuncia::whereBetween('victima_edad', [6, 11])->count();
        
        // Adolescencia: De 12 a 18 años
        $adolescencia = Denuncia::whereBetween('victima_edad', [12, 18])->count();

        // Juventud: De 14 a 26 años
        $juventud = Denuncia::whereBetween('victima_edad', [14, 26])->count();

        // Adultez: De 27 a 59 años
        $adultez = Denuncia::whereBetween('victima_edad', [27, 50])->count();

        // Persona mayor: De 60 años o más
        $personaMayor = Denuncia::whereBetween('victima_edad', [60, 100])->count();

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
            'totaldenunciasConfianza',
            'totaldenunciasBase',
            'totaldenunciasContrato',
            'totaldenunciasEnFormacion',
            'totaldenunciasOtra',
            'primeraInfancia',
            'infancia',
            'adolescencia',
            'juventud',
            'adultez',
            'personaMayor'
        ));
    }
}
