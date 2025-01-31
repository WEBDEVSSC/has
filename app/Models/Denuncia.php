<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    // Si el nombre de la tabla no es el plural del nombre del modelo, especifica el nombre de la tabla aquí
    protected $table = 'denuncias';

    // Si tu tabla tiene una clave primaria diferente a 'id', puedes especificarla aquí
    protected $primaryKey = 'id';

    // Si la clave primaria no es un entero incremental, indica si es un UUID o algo similar
    public $incrementing = true;

    // Si tu clave primaria no es de tipo entero, indícalo aquí
    protected $keyType = 'int';

    // Si tu tabla tiene timestamps (created_at y updated_at), puedes desactivar la administración automática de timestamps aquí
    public $timestamps = true;
}