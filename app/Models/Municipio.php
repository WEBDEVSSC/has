<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    // Si la tabla en la base de datos no sigue la convención plural de Laravel, puedes especificar el nombre aquí
    protected $table = 'municipios';

    // Si la tabla no tiene las columnas de marca de tiempo, desactiva esto
    public $timestamps = true;

    // Define los campos que pueden ser asignados en masa
    protected $fillable = ['nombre', 'jurisdiccion', 'created_at', 'updated_at'];
}
