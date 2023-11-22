<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Mantenimiento e Instalación de Sistemas Fotovoltaicos',
            'pro_nivelFormacion' => 'Técnico',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Sistemas',
            'pro_nivelFormacion' => 'Técnico',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Programación de Software',
            'pro_nivelFormacion' => 'Técnico',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Programación de Aplicaciones y Servicios para la Nube',
            'pro_nivelFormacion' => 'Técnico',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Diseño e Integración Multimedia',
            'pro_nivelFormacion' => 'Técnico',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Mantenimiento Electrónico e Instrumental Industrial',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Análisis y Desarrollo de Software',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Mantenimiento de Equipo Biomédico',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Diseño e Integración de Automatismos Mecatrónicos',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Producción de Componentes Mecánicos con Máquinas de Control Numérico Computarizado',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Gestión de la Producción Industrial',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Desarrollo de Sistemas Electrónicos Industriales',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Automatización de Sistemas Mecatrónicos',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Automatización Industrial',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Implementación de Infraestructura de Tecnología de la Información y las Comunicaciones',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Implementación y Mantenimiento de Sistemas de Instrumentación y Control de Procesos Industriales',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
        DB::table('programas')->insert([
            'pro_codigo' => fake()->unique()->randomNumber(7, true),
            'pro_nombre' => 'Gestión Logística',
            'pro_nivelFormacion' => 'Tecnólogo',
        ]);
    }
}
