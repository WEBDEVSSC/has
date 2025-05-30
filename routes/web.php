<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DenunciaDocumentacionController;
use App\Http\Controllers\DenunciaReincidenciaController;
use App\Http\Controllers\DenunciaSeguimientoController;
use App\Http\Controllers\FileController;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicroSitioController;
use App\Http\Controllers\NotificacionController;
use App\Models\DenunciaDocumentacion;

/**
 * 
 * 
 * 
 * RUTAS PUBLICAS PARA LA PAGINA WEB
 * UTILIZANDO MICROSITIOCONTROLLER
 * 
 * 
 */



// Ruta de bienvenida

Route::get('/', [MicroSitioController::class, 'inicio'])->name('inicio');

Route::get('/formato-denuncia',[MicroSitioController::class,'formatoDenuncia'])->name('formatoDenuncia');
Route::post('/formato-denuncia-store',[MicroSitioController::class,'formatoDenunciaStore'])->name('formatoDenunciaStore');

Route::get('/protocolo', [MicroSitioController::class, 'protocolo'])->name('protocolo');
Route::get('/pronunciamiento', [MicroSitioController::class, 'pronunciamiento'])->name('pronunciamiento');
Route::get('/queEs', [MicroSitioController::class, 'QueEs'])->name('queEs');
Route::get('/buzonDenuncia', [MicroSitioController::class, 'buzon'])->name('buzonDenuncia');
Route::post('/buzonDenuncia', [MicroSitioController::class, 'buzonStore'])->name('buzonStore');

// Ruta para mostrar el formulario de Seguimiento
Route::get('/buzon-seguimiento', [MicroSitioController::class, 'buzonSeguimiento'])->name('buzonSeguimiento');
Route::post('/buzon-seguimiento-resultados', [MicroSitioController::class, 'buzonSeguimientoShow'])->name('buzonSeguimientoShow');

// Ruta para mostrar el formulario de Reincidencia
Route::get('/buzon-reincidencia', [MicroSitioController::class, 'buzonReincidencia'])->name('buzonReincidencia');
Route::post('/buzon-reincidencia-create', [MicroSitioController::class, 'buzonReincidenciaCreate'])->name('buzonReincidenciaCreate');
Route::post('/buzon-reincidencia-store', [MicroSitioController::class, 'buzonReincidenciaStore'])->name('buzonReincidenciaStore');

/*Route::get('/phpinfo', function () {
    phpinfo();
});*/
    
    //DECLARAMOS LA VARIABLE A LA CUAL LE CARGAMOS EL METODO LOAD Y LA RUTA DE LA VISTA
    //$pdf = PDF::loadView('pdf.pdf');

    //LO IMRPIME EN EL NAVEGADOR
    //return $pdf->stream();

    //LO DESCARGA AUTOMATICAMENTE
    //return $pdf->download();

    //LO GUARDA EN UN DIRECTORIO EN ESPECIFICO
    //return $pdf->save();




// RUTA PARA MOSTRAR EL FORMULARIO DE INICIO

Auth::routes();

//RUTA PARA NUEVAS

Route::middleware(['auth'])->group(function () 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /*
    *
    *
    * DENUNCIA CONTROLLER
    *
    */

    //RUTA PARA MOSTRAR EL PANEL DE NUEVAS DENUNCIAS
    Route::get('admin/nuevas', [DenunciaController::class, 'nuevas'])->name('denuncias.nuevas');

    //RUTA PARA MOSTRAR EL PANEL DE DENUNCIAS EN PROCESO
    Route::get('admin/enproceso', [DenunciaController::class, 'enproceso'])->name('denuncias.enproceso');

    //RUTA PARA MOSTRAR EL PANEL DE DENUNCIAS ATENDIDAS
    Route::get('admin/atendidas', [DenunciaController::class, 'atendidas'])->name('denuncias.atendidas');

    //RUTA PARA MOSTRAR TODOS LOS REGISTROS
    Route::get('admin/total', [DenunciaController::class, 'total'])->name('denuncias.total');

    //RUTA PARA MOSTRAR LA VISTA DE DETALLES DE DENUNCIA
    Route::get('admin/{id}/detalles', [DenunciaController::class, 'detalles'])->name('denuncias.detalles');

    Route::get('admin/detalles/{filename}', [DenunciaController::class, 'download'])->name('file.detalles');


    

    //RUTA PARA MOSTRAR EL FORMULARIO DEL STATUS
    Route::get('admin/{id}/status', [DenunciaController::class, 'status'])->name('denuncias.status');

    //RUTA PARA ACTUALIZAR EL STATUS EN LA BD
    Route::put('admin/{id}/statusupdate', [DenunciaController::class, 'update'])->name('denuncias.update');

    /*
    *
    *
    * DENUNCIA SEGUIMIENTO CONTROLLER
    *
    */

    //RUTA PARA MOSTRAR EL FORMULARIO PARA SEGUIMIENTO
    Route::get('admin/{id}/seguimientocreate', [DenunciaSeguimientoController::class, 'create'])->name('seguimiento.create');

    //RUTA PARA REGISTRAR EL SEGUIMIENTO
    Route::post('admin/seguimientostore', [DenunciaSeguimientoController::class, 'store'])->name('seguimiento.store');

    /*
    *
    *
    * RUTAS PARA SUBIR UN ARCHIVO EN DOCUMENTACION
    *
    */

    //RUTA PARA MOSTRAR EL FORMULARIO PARA SUBIR DOCUMENTOS ANEXOS
    Route::get('admin/{id}/documento', [DenunciaDocumentacionController::class, 'create'])->name('documento.create');

    //RUTA PARA GUARDAR LOS DATOS DEL FORMULARIO PARA SUBIR DOCUMENTOS
    Route::post('admin/{id}/documentostore', [DenunciaDocumentacionController::class, 'store'])->name('documento.store');

    //RUTA PARA VER EL DOCUMENTO QUE SE ACABA DE SUBIR
    Route::post('admin/{id}/documentoshow', [DenunciaDocumentacionController::class, 'show'])->name('documento.show');

    //ENLACE PARA DESCARGAR DE MANERA SEGURA LOS DOCUMENTOS
    Route::get('download/{filename}', [DenunciaDocumentacionController::class, 'download'])->name('file.download');

    /*
    *
    *
    * RUTAS PARA REINCIDENCIA
    *
    */

    //RUTA PARA MOSTRAR EL FORMULARIO PARA CREAR UNA NUEVA REINCIDENCIA
    Route::get('admin/{id}/reincidencia', [DenunciaReincidenciaController::class, 'create'])->name('reincidencia.create');

    //RUTA PARA GUARDAR LOS DATOS DEL FORMULARIO PARA SUBIR DOCUMENTOS
    Route::post('admin/{id}/reincidenciatore', [DenunciaReincidenciaController::class, 'store'])->name('reincidencia.store');

    //ENLACE PARA DESCARGAR DE MANERA SEGURA LOS DOCUMENTOS
    Route::get('download/{filename}', [DenunciaReincidenciaController::class, 'download'])->name('file.download');

    /**
     * 
     * 
     *  RUTAS PARA GENERAR ARCHIVO PDF CON DONPDF
     * 
     * 
     */

    Route::get('admin/{id}/generar-pdf', [DenunciaController::class, 'generarPDF'])->name('generar.pdf');

    /**
     * 
     * 
     *  RUTAS PARA NOTIFICACION DE CORREO
     * 
     * 
     */

    Route::get('admin/notificaciones/index',[NotificacionController::class,'index'])->name('notificacionesIndex');

});
