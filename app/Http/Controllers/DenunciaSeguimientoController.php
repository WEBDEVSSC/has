<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaSeguimientoMail;
use App\Models\Denuncia;
use App\Models\DenunciaSeguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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
        // Consultamos el correo de esa denuncia
        $correo = Denuncia::find($request->id_registro)->correo;
        
        // Consultamos el folio de esa denuncia
        $folio = Denuncia::find($request->id_registro)->folio;

        // Descodificamos el correo
        $correoDeCrypt = Crypt::decryptString($correo);

        $seguimiento = new DenunciaSeguimiento();

        $seguimiento->relacion = $request->id_registro;
        $seguimiento->mensaje = $request->mensaje;

        // Enviamos el correo de confirmacion
        //Mail::to(['cesartorres.1688@gmail.com',$correoDeCrypt])->send(new DenunciaSeguimientoMail($folio));

        $seguimiento->save();

        return redirect()->route('denuncias.nuevas')->with('success', 'Mensaje registrado exitosamente.');
        
        
    }
}