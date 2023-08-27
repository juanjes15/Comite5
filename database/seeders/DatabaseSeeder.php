<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        
        $this->call([
            ProgramaSeeder::class,
            InstructorSeeder::class,
            FichaSeeder::class,
            AprendizSeeder::class,
            CapituloSeeder::class,
            ArticuloSeeder::class,
            NumeralSeeder::class,
        ]);
    }
}