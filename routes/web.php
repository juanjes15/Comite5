<?php

use App\Http\Controllers\InsViewController;
use App\Http\Controllers\GesViewController;
use App\Http\Controllers\Profile\AvatarController;
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
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
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

    //Rutas para el instructor
    Route::middleware('checkUserRole:Instructor')->group(function () {
        //RUTAS PARA SOLICITAR UN COMITÉ
        //Inicio (solo vista)
        Route::get('/instructor/solicitudInicio', [InsViewController::class, 'sol1Ini'])->name('insViews.sol1Ini');
        //Muestra la vista (GET) y almacena (POST) la ficha a la cuál pertence el aprendiz que va a comité
        Route::get('/instructor/solicitudFicha', [InsViewController::class, 'sol2Fic'])->name('insViews.sol2Fic');
        Route::post('/instructor/solicitudFicha', [InsViewController::class, 'store2Fic']);
        //Muestra la vista (GET) y almacena (POST) la información básica para solicitar un comité
        Route::get('/instructor/solicitudInfoBasica', [InsViewController::class, 'sol3Inf'])->name('insViews.sol3Inf');
        Route::post('/instructor/solicitudInfoBasica', [InsViewController::class, 'store3Inf']);
        //Muestra la vista (GET) y almacena (POST) los instructores relacionados en una solicitud de comité
        Route::get('/instructor/solicitudInstructores', [InsViewController::class, 'sol4Ins'])->name('insViews.sol4Ins');
        Route::post('/instructor/solicitudInstructores', [InsViewController::class, 'store4Ins']);
        //Muestra la vista (GET) y almacena (POST) los aprendices relacionados en una solicitud de comité
        Route::get('/instructor/solicitudAprendices', [InsViewController::class, 'sol5Apr'])->name('insViews.sol5Apr');
        Route::post('/instructor/solicitudAprendices', [InsViewController::class, 'store5Apr']);
        //Muestra la vista (GET) y almacena (POST) las faltas cometidas en una solicitud de comité
        Route::get('/instructor/solicitudFaltas', [InsViewController::class, 'sol6Fal'])->name('insViews.sol6Fal');
        Route::post('/instructor/solicitudFaltas', [InsViewController::class, 'store6Fal']);
        Route::post('/instructor/articulos', [InsViewController::class, 'articulos']);
        Route::post('/instructor/numerals', [InsViewController::class, 'numerals']);
        //Muestra la vista (GET) y almacena (POST) las pruebas en una solicitud de comité
        Route::get('/instructor/solicitudPruebas', [InsViewController::class, 'sol7Pru'])->name('insViews.sol7Pru');
        Route::post('/instructor/solicitudPruebas', [InsViewController::class, 'store7Pru']);

        //RUTAS PARA REGISTRAR UNA NOVEDAD EN UNA SOLICITUD (REVISAR/EDITAR SOLICITUD)
        //Todas las solicitudes del gestor y eliminar solicitudes
        Route::get('/instructor/revisarSolicitudes', [InsViewController::class, 'revSol'])->name('insViews.revSol');
        Route::delete('/instructor/eliminarSolicitud/{solicitud}', [InsViewController::class, 'revDel'])->name('insViews.revDel');
        //Detalle, actualizar inf básica, descargar y actualizar pruebas de la solicitud
        Route::get('/instructor/revisarDetalle/{solicitud}', [InsViewController::class, 'revDet'])->name('insViews.revDet');
        Route::put('/instructor/revisarInfoBasica/{solicitud}', [InsViewController::class, 'updInf'])->name('insViews.updInf');
        Route::put('/instructor/revisarPruebas/{prueba}', [InsViewController::class, 'updPru'])->name('insViews.updPru');
        Route::get('/instructor/descargar/{prueba}', [InsViewController::class, 'dowPru'])->name('insViews.dowPru');
        //Muestra la vista (GET) y almacena (POST) los instructores relacionados de una solicitud
        Route::get('/instructor/revisarInstructores/{solicitud}', [InsViewController::class, 'revIns'])->name('insViews.revIns');
        Route::post('/instructor/revisarInstructores/{solicitud}', [InsViewController::class, 'storeIns']);
        Route::delete('/instructor/eliminarInstructor/{solicitud}/{instructor}', [InsViewController::class, 'delIns'])->name('insViews.delIns');
        //Muestra la vista (GET) y almacena (POST) los aprendices relacionados de una solicitud
        Route::get('/instructor/revisarAprendices/{solicitud}', [InsViewController::class, 'revApr'])->name('insViews.revApr');
        Route::post('/instructor/revisarAprendices/{solicitud}', [InsViewController::class, 'storeApr']);
        Route::delete('/instructor/eliminarAprendiz/{solicitud}/{aprendiz}', [InsViewController::class, 'delApr'])->name('insViews.delApr');
        //Muestra la vista (GET) y almacena (POST) las faltas cometidas en una solicitud. Elimina articulos y numerales
        Route::get('/instructor/revisarFaltas/{solicitud}', [InsViewController::class, 'revFal'])->name('insViews.revFal');
        Route::post('/instructor/revisarFaltas/{solicitud}', [InsViewController::class, 'storeFal']);
        Route::delete('/instructor/eliminarArticulo/{solicitud}/{articulo}', [InsViewController::class, 'revArt'])->name('insViews.revArt');
        Route::delete('/instructor/eliminarNumeral/{solicitud}/{numeral}', [InsViewController::class, 'revNum'])->name('insViews.revNum');
    });

    //Rutas para el Gestor de Comites
    Route::middleware('checkUserRole:Gestor de Comites')->group(function () {
        //RUTAS PARA ACEPTAR O RECHAZAR UNA SOLICITUD A COMITÉ
        //Todas las solicitudes en estado "Solicitado"
        Route::get('/gestor/solicitudes', [GesViewController::class, 'solAll'])->name('gesViews.solAll');
        //Detalle de la solicitud
        Route::get('/gestor/detalleSolicitud/{solicitud}', [GesViewController::class, 'solDet'])->name('gesViews.solDet');
        Route::get('/gestor/descargar/{prueba}', [GesViewController::class, 'dowPru'])->name('gesViews.dowPru');
        //Aceptar y rechazar
        Route::get('/gestor/rechazar/{solicitud}', [GesViewController::class, 'solNo'])->name('gesViews.solNo');
        Route::get('/gestor/aceptar/{solicitud}', [GesViewController::class, 'solSi'])->name('gesViews.solSi');
        Route::post('/gestor/inicioComite', [GesViewController::class, 'comIni'])->name('gesViews.comIni');

        //RUTAS PARA ENTRAR EN SESIÓN
        //Todos los comites en estado "Iniciado"
        Route::get('/gestor/comites', [GesViewController::class, 'comAll'])->name('gesViews.comAll');
        //Detalle del comité
        Route::get('/gestor/detalleComite/{comite}', [GesViewController::class, 'comDet'])->name('gesViews.comDet');
        //Inicio de sesión
        Route::get('/gestor/sesionComite/{comite}', [GesViewController::class, 'comSes'])->name('gesViews.comSes');
        //Descargos
        Route::put('/gestor/descargoInstructor/{comite}/{instructor}', [GesViewController::class, 'comIns'])->name('gesViews.comIns');
        Route::put('/gestor/descargoAprendiz/{comite}/{aprendiz}', [GesViewController::class, 'comApr'])->name('gesViews.comApr');
    });
});

//Rutas de Breeze para el login, registro y verificación de correo. Ver routes/auth.php
require __DIR__ . '/auth.php';
