<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\NumeralController;
use App\Http\Controllers\UserController;

//Landing page
Route::view('/', 'welcome');

//Rutas que se acceden sólo si está logueado/autenticado
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rutas para el administrador
    Route::middleware('checkUserRole:Administrador')->group(function () {
        //Rutas para los CRUD'S
        Route::resources([
            'programas' => ProgramaController::class,
            'fichas' => FichaController::class,
            'instructors' => InstructorController::class,
            'aprendizs' => AprendizController::class,
            'capitulos' => CapituloController::class,
            'articulos' => ArticuloController::class,
            'numerals' => NumeralController::class,
        ]);
        //Rutas para el CRUD de usuarios y asignación de roles
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/aprendiz', [UserController::class, 'addRolAprendiz'])->name('users.addRolAprendiz');
        Route::put('/users/aprendiz/{user}', [UserController::class, 'storeRolAprendiz'])->name('users.storeRolAprendiz');
        Route::get('/users/instructor', [UserController::class, 'addRolInstructor'])->name('users.addRolInstructor');
        Route::put('/users/instructor/{user}', [UserController::class, 'storeRolInstructor'])->name('users.storeRolInstructor');
    });
});

//Rutas de Breeze para el login, registro y verificación de correo. Ver routes/auth.php
require __DIR__ . '/auth.php';
