<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Creación de usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Administrador',
        ]);

        //Creación de usuarios de prueba
        User::factory(30)->create();

        //Ejecución de las demás semillas
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
