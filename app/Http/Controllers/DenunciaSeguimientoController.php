<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\DenunciaSeguimiento;
use Illuminate\Http\Request;

class DenunciaSeguimientoController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function create($id)
    {
        // Encuentra la denuncia por ID
        $denuncia = Denuncia::findOrFail($id);

        // Obtén los registros de denuncia_reincidencia que coincidan con if_folio
        $seguimientos = DenunciaSeguimiento::where('relacion', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Pasa los datos a la vista
        return view('seguimiento', [
            'denuncia' => $denuncia,
            'seguimientos' => $seguimientos,
        ]);
    }

    public function store(Request $request)
    {
        $seguimiento = new DenunciaSeguimiento();

        $seguimiento->relacion = $request->id_registro;
        $seguimiento->mensaje = $request->mensaje;

        $seguimiento->save();

        return redirect()->route('denuncias.nuevas')->with('success', 'Mensaje registrado exitosamente.');
        // Devolver una respuesta exitosa
        
    }
}