<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    //
    public function index()
    {
        $notificaciones = Notificacion::all();

        return view('notificacion.index', compact('notificaciones'));
    }
}
