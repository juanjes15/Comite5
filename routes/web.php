<?php

use App\Http\Controllers\InsViewController;
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

    //Rutas para el administrador y el instructor
    Route::middleware('checkUserRole:Administrador,Instructor')->group(function () {
        //RUTAS PARA SOLICITAR UN COMITÉ
        //Inicio (solo vista)
        Route::get('/InsViews/solicitudInicio', [InsViewController::class, 'sol1Ini'])->name('insViews.sol1Ini');
        //Muestra la vista (GET) y almacena (POST) la información básica para solicitar un comité
        Route::get('/InsViews/solicitudInfoBasica', [InsViewController::class, 'sol2Inf'])->name('insViews.sol2Inf');
        Route::post('/InsViews/solicitudInfoBasica', [InsViewController::class, 'store2Inf']);
        //Muestra la vista (GET) y almacena (POST) los instructores relacionados en una solicitud de comité
        Route::get('/InsViews/solicitudInstructores', [InsViewController::class, 'sol3Ins'])->name('insViews.sol3Ins');
        Route::post('/InsViews/solicitudInstructores', [InsViewController::class, 'store3Ins']);
        //Muestra la vista (GET) y almacena (POST) los aprendices relacionados en una solicitud de comité
        Route::get('/InsViews/solicitudAprendices', [InsViewController::class, 'sol4Apr'])->name('insViews.sol4Apr');
        Route::post('/InsViews/solicitudAprendices', [InsViewController::class, 'store4Apr']);
        //Muestra la vista (GET) y almacena (POST) las faltas cometidas en una solicitud de comité
        Route::get('/InsViews/solicitudFaltas', [InsViewController::class, 'sol5Fal'])->name('insViews.sol5Fal');
        Route::post('/InsViews/solicitudFaltas', [InsViewController::class, 'store5Fal']);
        //Muestra la vista (GET) y almacena (POST) las pruebas en una solicitud de comité
        Route::get('/InsViews/solicitudPruebas', [InsViewController::class, 'sol6Pru'])->name('insViews.sol6Pru');
        Route::post('/InsViews/solicitudPruebas', [InsViewController::class, 'store6Pru']);
    });
});

//Rutas de Breeze para el login, registro y verificación de correo. Ver routes/auth.php
require __DIR__ . '/auth.php';
