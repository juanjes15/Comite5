<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'ficha_id' => fake()->numberBetween(1, 10),
            ]);
        }
    }
}
