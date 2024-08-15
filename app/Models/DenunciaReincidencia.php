<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DenunciaReincidencia extends Model
{

    // Especifica la tabla asociada si no sigue la convención de nombres
    protected $table = 'denuncia_reincidencia';

    // Si el modelo usa timestamps (created_at, updated_at)
    public $timestamps = true;

    // Especifica los atributos que pueden ser asignados masivamente
    protected $fillable = [
        'denuncia_id',
        'descripcion',
    ];

    // Si deseas definir relaciones, puedes agregar métodos aquí
    // Ejemplo: una relación con el modelo Denuncia
    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'denuncia_id');
    }
}
