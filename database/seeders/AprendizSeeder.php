<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AprendizSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 60; $i++) {
            DB::table('aprendizs')->insert([
                'apr_identificacion' => fake()->unique()->randomNumber(9, true),
                'apr_nombres' => fake()->firstName(),
                'apr_apellidos' => fake()->lastName(),
                'apr_email' => fake()->unique()->safeEmail(),
                'apr_telefono' => fake()->phoneNumber(),
                'apr_direccion' => fake()->address(),
                'apr_fechaNacimiento' => fake()->date(),
                'apr_numComites' => 0,
                'ficha_id' => fake()->numberBetween(1, 5),
            ]);
        }
    }
}
