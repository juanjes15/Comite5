<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('instructors')->insert([
                'ins_identificacion' => fake()->unique()->randomNumber(9, true),
                'ins_nombres' => fake()->firstName(),
                'ins_apellidos' => fake()->lastName(),
                'ins_email' => fake()->unique()->safeEmail(),
                'ins_telefono' => fake()->phoneNumber(),
            ]);
        }
    }
}
