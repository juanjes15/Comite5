<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articulos')->insert([
            'art_numero' => 1,
            'art_descripcion' => 'Formación Profesional integral',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 2,
            'art_descripcion' => 'Comunidad Educativa SENA',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 3,
            'art_descripcion' => 'Aprendiz SENA',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 4,
            'art_descripcion' => 'Cumplimiento de Principios y Valores',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 5,
            'art_descripcion' => 'Centros de Convivencia',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 6,
            'art_descripcion' => 'Alcance',
            'capitulo_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 7,
            'art_descripcion' => 'Derechos del Aprendiz SENA',
            'capitulo_id' => 2,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 8,
            'art_descripcion' => 'Deberes del Aprendiz SENA',
            'capitulo_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 9,
            'art_descripcion' => 'Prohibiciones',
            'capitulo_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 10,
            'art_descripcion' => 'Ingreso',
            'capitulo_id' => 4,
        ]);
    }
}
