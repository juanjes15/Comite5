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

        //Creación de usuario aprendiz
        User::create([
            'name' => 'Aprendiz Genérico #1',
            'email' => 'aprendiz@aprendiz.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Aprendiz',
        ]);

        //Creación de usuario instructor
        User::create([
            'name' => 'Instructor Genérico #1',
            'email' => 'instructor@instructor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Instructor',
        ]);

        //Creación de usuario gestor
        User::create([
            'name' => 'Gestor de Comités',
            'email' => 'gestor@gestor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Gestor de Comités',
        ]);

        //Creación de usuario subdirector
        User::create([
            'name' => 'Subdirector',
            'email' => 'subdirector@subdirector.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Subdirector',
        ]);

        //Creación de usuarios de prueba
        User::factory(10)->create();

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
