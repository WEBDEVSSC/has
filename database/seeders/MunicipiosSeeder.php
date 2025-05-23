<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $municipios = [
            ['nombre' => 'ABASOLO', 'jurisdiccion' => 4],
            ['nombre' => 'ACUÑA', 'jurisdiccion' => 2],
            ['nombre' => 'ALLENDE', 'jurisdiccion' => 1],
            ['nombre' => 'ARTEAGA', 'jurisdiccion' => 8],
            ['nombre' => 'GUERRERO', 'jurisdiccion' => 1],
            ['nombre' => 'HIDALGO', 'jurisdiccion' => 1],
            ['nombre' => 'NAVA', 'jurisdiccion' => 1],
            ['nombre' => 'PIEDRAS NEGRAS', 'jurisdiccion' => 1],
            ['nombre' => 'VILLA UNION', 'jurisdiccion' => 1],
            ['nombre' => 'JIMENEZ', 'jurisdiccion' => 2],
            ['nombre' => 'MORELOS', 'jurisdiccion' => 2],
            ['nombre' => 'ZARAGOZA', 'jurisdiccion' => 2],
            ['nombre' => 'JUAREZ', 'jurisdiccion' => 3],
            ['nombre' => 'MUZQUIZ', 'jurisdiccion' => 3],
            ['nombre' => 'PROGRESO', 'jurisdiccion' => 3],
            ['nombre' => 'SABINAS', 'jurisdiccion' => 3],
            ['nombre' => 'SAN JUAN DE SABINAS', 'jurisdiccion' => 3],
            ['nombre' => 'CANDELA', 'jurisdiccion' => 4],
            ['nombre' => 'CASTAÑOS', 'jurisdiccion' => 4],
            ['nombre' => 'ESCOBEDO', 'jurisdiccion' => 4],
            ['nombre' => 'FRONTERA', 'jurisdiccion' => 4],
            ['nombre' => 'MONCLOVA', 'jurisdiccion' => 4],
            ['nombre' => 'NADADORES', 'jurisdiccion' => 4],
            ['nombre' => 'SAN BUENAVENTURA', 'jurisdiccion' => 4],
            ['nombre' => 'CUATRO CIENEGAS', 'jurisdiccion' => 5],
            ['nombre' => 'LA MADRID', 'jurisdiccion' => 5],
            ['nombre' => 'OCAMPO', 'jurisdiccion' => 5],
            ['nombre' => 'SACRAMENTO', 'jurisdiccion' => 5],
            ['nombre' => 'SIERRA MOJADA', 'jurisdiccion' => 5],
            ['nombre' => 'MATAMOROS', 'jurisdiccion' => 6],
            ['nombre' => 'TORREON', 'jurisdiccion' => 6],
            ['nombre' => 'VIESCA', 'jurisdiccion' => 6],
            ['nombre' => 'FCO I MADERO', 'jurisdiccion' => 7],
            ['nombre' => 'SAN PEDRO', 'jurisdiccion' => 7],
            ['nombre' => 'GENERAL CEPEDA', 'jurisdiccion' => 8],
            ['nombre' => 'PARRAS', 'jurisdiccion' => 8],
            ['nombre' => 'RAMOS ARIZPE', 'jurisdiccion' => 8],
            ['nombre' => 'SALTILLO', 'jurisdiccion' => 8],
        ];

        foreach ($municipios as $municipio) {
            Municipio::create($municipio);
        }
    }
}
