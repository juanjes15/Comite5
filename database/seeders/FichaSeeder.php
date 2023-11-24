<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FichaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('fichas')->insert([
                'fic_codigo' => fake()->unique()->randomNumber(7, true),
                'fic_inicioLectiva' => fake()->date(),
                'fic_finLectiva' => fake()->date(),
                'fic_inicioProductiva' => fake()->date(),
                'fic_finProductiva' => fake()->date(),
                'fic_modalidad' => 'Presencial',
                'fic_jornada' => 'Diurna',
                'programa_id' => fake()->numberBetween(1, 10),
                'instructor_id' => fake()->numberBetween(1, 5),
            ]);
        }
    }
}
