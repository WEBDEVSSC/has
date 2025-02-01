<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    // Nombre de la tabla (opcional si sigue la convención de nombres de Laravel)
    protected $table = 'notificaciones';

    // Campos asignables masivamente
    protected $fillable = [
        'email',
        'responsable',
    ];
}
