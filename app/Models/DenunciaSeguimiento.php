<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaSeguimiento extends Model
{
    use HasFactory;

    // Indica el nombre de la tabla en la base de datos
    protected $table = 'denuncia_seguimiento';

    // Indica los campos que pueden ser llenados masivamente
    protected $fillable = ['relacion', 'mensaje']; 

    // Indica si el modelo debe usar las columnas de timestamps
    public $timestamps = true;

    // Relación: un seguimiento pertenece a una denuncia
    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'relacion', 'id');
    }
}
