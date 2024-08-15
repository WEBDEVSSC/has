<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    /**
     * Muestra el formulario con el select lleno.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Obtén todos los registros de la tabla entidad
        $entidades = Entidad::orderBy('nombre', 'asc')->get();

        dd($entidades); // Verifica que los datos están ordenados correctamente

        // Pasa los datos a la vista
        return view('formulario', compact('entidades'));
    }
}
