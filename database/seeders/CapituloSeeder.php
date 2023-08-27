<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapituloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('capitulos')->insert([
            'cap_numero' => 'I',
            'cap_descripcion' => 'Principios Generales',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'II',
            'cap_descripcion' => 'Derechos, Estímulos del Aprendiz SENA',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'III',
            'cap_descripcion' => 'Deberes y Prohibiciones del Aprendiz SENA',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'IV',
            'cap_descripcion' => 'Trámites Académicos y Administrativos',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'V',
            'cap_descripcion' => 'Incumplimiento y Deserción',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'VI',
            'cap_descripcion' => 'Faltas Académicas y Disciplinarias',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'VII',
            'cap_descripcion' => 'Medidas Formativas y Sanciones',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'VIII',
            'cap_descripcion' => 'Evaluación',
        ]);
        DB::table('capitulos')->insert([
            'cap_numero' => 'IX',
            'cap_descripcion' => 'Representatividad de los Aprendices',
        ]);
    }
}