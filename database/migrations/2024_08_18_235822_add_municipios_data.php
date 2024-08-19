<?php

use App\Models\Municipio;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Puedes agregar datos en la tabla utilizando el modelo Municipio
        Municipio::insert([
            [
                'nombre' => 'ABASOLO',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'ACUÑA', 
                'jurisdiccion' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                
            ],
            [
                'nombre' => 'ALLENDE',
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'ARTEAGA',
                'jurisdiccion' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'GUERRERO',
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'HIDALGO',
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'NAVA', 
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'PIEDRAS NEGRAS',
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'VILLA UNION',
                'jurisdiccion' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'JIMENEZ',
                'jurisdiccion' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'MORELOS',
                'jurisdiccion' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'ZARAGOZA',
                'jurisdiccion' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'JUAREZ',
                'jurisdiccion' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'MUZQUIZ',
                'jurisdiccion' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'PROGRESO',
                'jurisdiccion' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SABINAS',
                'jurisdiccion' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SAN JUAN DE SABINAS',
                'jurisdiccion' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'CANDELA',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'CASTAÑOS',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'ESCOBEDO',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'FRONTERA',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'MONCLOVA',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'NADADORES',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SAN BUENAVENTURA',
                'jurisdiccion' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'CUATRO CIENEGAS',
                'jurisdiccion' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'LA MADRID',
                'jurisdiccion' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'OCAMPO',
                'jurisdiccion' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SACRAMENTO',
                'jurisdiccion' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SIERRA MOJADA',
                'jurisdiccion' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'MATAMOROS',
                'jurisdiccion' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'TORREON',
                'jurisdiccion' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'VIESCA',
                'jurisdiccion' => '6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'FCO I MADERO',
                'jurisdiccion' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SAN PEDRO',
                'jurisdiccion' => '7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'GENERAL CEPEDA',
                'jurisdiccion' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'PARRAS',
                'jurisdiccion' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'RAMOS ARIZPE',
                'jurisdiccion' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'SALTILLO',
                'jurisdiccion' => '8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar los municipios agregados en la migración
        Municipio::whereIn('nombre', [
            'ABASOLO',
            'ACUÑA',
            'ALLENDE',
            'ARTEAGA',
            'GUERRERO',
            'HIDALGO',
            'NAVA',
            'PIEDRAS NEGRAS',
            'VILLA UNION',
            'JIMENEZ',
            'MORELOS',
            'ZARAGOZA',
            'JUAREZ',
            'MUZQUIZ',
            'PROGRESO',
            'SABINAS',
            'SAN JUAN DE SABINAS',
            'CANDELA',
            'CASTAÑOS',
            'ESCOBEDO',
            'FRONTERA',
            'MONCLOVA',
            'NADADORES',
            'SAN BUENAVENTURA',
            'CUATRO CIENEGAS',
            'LA MADRID',
            'OCAMPO',
            'SACRAMENTO',
            'SIERRA MOJADA',
            'MATAMOROS',
            'TORREON',
            'VIESCA',
            'FCO I MADERO',
            'SAN PEDRO',
            'GENERAL CEPEDA',
            'PARRAS',
            'RAMOS ARIZPE',
            'SALTILLO',
        ])->delete();
    }
};
