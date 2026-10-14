<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Importación de Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MicroSitioController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DenunciaDocumentacionController;
use App\Http\Controllers\DenunciaReincidenciaController;
use App\Http\Controllers\DenunciaSeguimientoController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (MICROSITIO)
|--------------------------------------------------------------------------
*/

// Muestra la página principal / bienvenida del sitio
Route::get('/', [MicroSitioController::class, 'inicio'])->name('inicio');

// Muestra el formulario para realizar una denuncia pública
Route::get('/formato-denuncia', [MicroSitioController::class, 'formatoDenuncia'])->name('formatoDenuncia');

// Procesa y guarda la denuncia enviada por el ciudadano (Protegido contra Spam con Throttle: máximo 5 envíos por minuto)
Route::post('/formato-denuncia-store', [MicroSitioController::class, 'formatoDenunciaStore'])
    ->middleware('throttle:5,1')
    ->name('formatoDenunciaStore');

// Muestra la información relativa al protocolo institucional
Route::get('/protocolo', [MicroSitioController::class, 'protocolo'])->name('protocolo');

// Muestra el documento/información del pronunciamiento
Route::get('/pronunciamiento', [MicroSitioController::class, 'pronunciamiento'])->name('pronunciamiento');

// Muestra la sección descriptiva del comité/sistema
Route::get('/queEs', [MicroSitioController::class, 'QueEs'])->name('queEs');

// Muestra la vista del buzón de denuncias
Route::get('/buzonDenuncia', [MicroSitioController::class, 'buzon'])->name('buzonDenuncia');

// Guarda los mensajes/quejas recibidos en el buzón público (Protegido con Throttle)
Route::post('/buzonDenuncia', [MicroSitioController::class, 'buzonStore'])
    ->middleware('throttle:5,1')
    ->name('buzonStore');

// Muestra el formulario de consulta de seguimiento para el denunciante
Route::get('/buzon-seguimiento', [MicroSitioController::class, 'buzonSeguimiento'])->name('buzonSeguimiento');

// Consulta los resultados del seguimiento (Protegido contra escaneo masivo con Throttle)
Route::post('/buzon-seguimiento-resultados', [MicroSitioController::class, 'buzonSeguimientoShow'])
    ->middleware('throttle:10,1')
    ->name('buzonSeguimientoShow');

// Muestra la vista para solicitar/registrar una reincidencia desde la parte pública
Route::get('/buzon-reincidencia', [MicroSitioController::class, 'buzonReincidencia'])->name('buzonReincidencia');

// Procesa la solicitud o búsqueda inicial de reincidencia (Protegido con Throttle)
Route::post('/buzon-reincidencia-create', [MicroSitioController::class, 'buzonReincidenciaCreate'])
    ->middleware('throttle:10,1')
    ->name('buzonReincidenciaCreate');

// Registra la reincidencia en la base de datos (Protegido con Throttle)
Route::post('/buzon-reincidencia-store', [MicroSitioController::class, 'buzonReincidenciaStore'])
    ->middleware('throttle:5,1')
    ->name('buzonReincidenciaStore');


/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

// Rutas predeterminadas de autenticación (Login, Reset Password). Desactiva el registro público si solo el superAdmin crea usuarios.
Auth::routes(['register' => false]);


/*
|--------------------------------------------------------------------------
| PANEL ADMINISTRATIVO (REQUERE AUTENTICACIÓN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Vista principal del panel de administración
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    /*
    |--------------------------------------------------------------------------
    | GESTIÓN DE DENUNCIAS
    |--------------------------------------------------------------------------
    */

    // Muestra el listado de denuncias nuevas ingresadas
    Route::get('/nuevas', [DenunciaController::class, 'nuevas'])->name('denuncias.nuevas');

    // Muestra el listado de denuncias actualmente en trámite/proceso
    Route::get('/enproceso', [DenunciaController::class, 'enproceso'])->name('denuncias.enproceso');

    // Muestra el listado de denuncias concluidas/atendidas
    Route::get('/atendidas', [DenunciaController::class, 'atendidas'])->name('denuncias.atendidas');

    // Muestra la lista consolidada de todas las denuncias
    Route::get('/total', [DenunciaController::class, 'total'])->name('denuncias.total');

    // Muestra el detalle de una denuncia específica (Validado que el ID sea estrictamente numérico)
    Route::get('/{id}/detalles', [DenunciaController::class, 'detalles'])
        ->whereNumber('id')
        ->name('denuncias.detalles');

    // Descarga/visualiza archivos adjuntos a los detalles (Validado contra Path Traversal)
    Route::get('/detalles/archivo/{filename}', [DenunciaController::class, 'download'])
        ->where('filename', '[A-Za-z0-9_\-\.]+')
        ->name('file.detalles');

    // Muestra el formulario para cambiar el estatus de la denuncia
    Route::get('/{id}/status', [DenunciaController::class, 'status'])
        ->whereNumber('id')
        ->name('denuncias.status');

    // Actualiza el estatus de la denuncia en la base de datos
    Route::put('/{id}/statusupdate', [DenunciaController::class, 'update'])
        ->whereNumber('id')
        ->name('denuncias.update');

    // Genera la ficha/expediente completo en formato PDF
    Route::get('/{id}/generar-pdf', [DenunciaController::class, 'generarPDF'])
        ->whereNumber('id')
        ->name('generar.pdf');

    /*
    |--------------------------------------------------------------------------
    | SEGUIMIENTO DE DENUNCIAS
    |--------------------------------------------------------------------------
    */

    // Muestra el formulario interno para registrar un nuevo avance/seguimiento
    Route::get('/{id}/seguimientocreate', [DenunciaSeguimientoController::class, 'create'])
        ->whereNumber('id')
        ->name('seguimiento.create');

    // Guarda el nuevo seguimiento administrativo
    Route::post('/seguimientostore', [DenunciaSeguimientoController::class, 'store'])->name('seguimiento.store');

    /*
    |--------------------------------------------------------------------------
    | DOCUMENTACIÓN Y ANEXOS
    |--------------------------------------------------------------------------
    */

    // Muestra el formulario para anexar documentos al expediente
    Route::get('/{id}/documento', [DenunciaDocumentacionController::class, 'create'])
        ->whereNumber('id')
        ->name('documento.create');

    // Guarda los documentos subidos al servidor
    Route::post('/{id}/documentostore', [DenunciaDocumentacionController::class, 'store'])
        ->whereNumber('id')
        ->name('documento.store');

    // Muestra un documento específico cargado
    Route::post('/{id}/documentoshow', [DenunciaDocumentacionController::class, 'show'])
        ->whereNumber('id')
        ->name('documento.show');

    // Descarga segura de expedientes/documentos adjuntos
    Route::get('/documentos/download/{filename}', [DenunciaDocumentacionController::class, 'download'])
        ->where('filename', '[A-Za-z0-9_\-\.]+')
        ->name('documento.download');

    /*
    |--------------------------------------------------------------------------
    | REINCIDENCIAS
    |--------------------------------------------------------------------------
    */

    // Formulario administrativo para vincular una reincidencia
    Route::get('/{id}/reincidencia', [DenunciaReincidenciaController::class, 'create'])
        ->whereNumber('id')
        ->name('reincidencia.create');

    // Guarda el registro de reincidencia
    Route::post('/{id}/reincidenciastore', [DenunciaReincidenciaController::class, 'store'])
        ->whereNumber('id')
        ->name('reincidencia.store');

    // Descarga segura de adjuntos de reincidencia
    Route::get('/reincidencia/download/{filename}', [DenunciaReincidenciaController::class, 'download'])
        ->where('filename', '[A-Za-z0-9_\-\.]+')
        ->name('file.download');

    /*
    |--------------------------------------------------------------------------
    | NOTIFICACIONES
    |--------------------------------------------------------------------------
    */

    // Muestra la bandeja/panel de notificaciones del sistema
    Route::get('/notificaciones/index', [NotificacionController::class, 'index'])->name('notificacionesIndex');

    /*
    |--------------------------------------------------------------------------
    | ADMINISTRACIÓN DE USUARIOS (SÓLO SUPERADMIN)
    |--------------------------------------------------------------------------
    */

    Route::middleware(['can:superAdmin'])->prefix('usuarios')->group(function () {
        // Listado general de usuarios
        Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');

        // Formulario de creación de nuevos usuarios
        Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');

        // Guarda el nuevo usuario
        Route::post('/store', [UsuarioController::class, 'store'])->name('usuarios.store');

        // Formulario de edición de un usuario existente
        Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->whereNumber('id')->name('usuarios.edit');

        // Actualiza la información del usuario
        Route::put('/{id}', [UsuarioController::class, 'update'])->whereNumber('id')->name('usuarios.update');

        // Elimina/desactiva un usuario
        Route::delete('/{id}', [UsuarioController::class, 'destroy'])->whereNumber('id')->name('usuarios.destroy');
    });

});