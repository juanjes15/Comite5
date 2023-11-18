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
        //Ejecución de semillas
        $this->call([
            ProgramaSeeder::class,
            InstructorSeeder::class,
            FichaSeeder::class,
            AprendizSeeder::class,
            CapituloSeeder::class,
            ArticuloSeeder::class,
            NumeralSeeder::class,
        ]);

        //Creación de usuarios de prueba
        User::factory(10)->create();

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
            'aprendiz_id' => 1,
        ]);

        //Creación de usuario instructor
        User::create([
            'name' => 'Instructor Genérico #1',
            'email' => 'instructor@instructor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Instructor',
            'instructor_id' => 1,
        ]);

        //Creación de usuario gestor
        User::create([
            'name' => 'Gestor de Comités',
            'email' => 'gestor@gestor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Gestor de Comites',
        ]);
    }
}
