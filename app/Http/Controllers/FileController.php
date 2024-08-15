<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function download($filename)
    {
        $filePath = storage_path('app/documents/' . $filename);

        if (file_exists($filePath)) 
        {
            return response()->download($filePath);
        } 
        else 
        {
            return redirect()->back()->with('error', 'Archivo no encontrado');
        }
    }
}
