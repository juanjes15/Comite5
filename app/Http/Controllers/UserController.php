<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('rol', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function update(Request $request, User $user)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'rol' => ['required', 'string', 'max:55'],
        ]);

        // Actualización de los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rol = $request->input('rol');
        $user->save();

        //Redirecciona a diferentes vistas dependiendo del rol seleccionado
        if ($user->rol === 'Aprendiz') {
            $aprendizs = Aprendiz::orderBy('apr_nombres')->orderBy('apr_apellidos')->get();
            return view('users.addRolAprendiz', compact('user', 'aprendizs'));
        } else if ($user->rol === 'Instructor') {
            $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();
            return view('users.addRolInstructor', compact('user', 'instructors'));
        } else {
            //Si el usuario anteriormente era un instructor, eliminamos dicha asociación
            if ($user->instructor_id !== null) {
                $user->instructor()->dissociate();
            }
            //Si el usuario anteriormente era un estudiante, eliminamos dicha asociación
            if ($user->aprendiz_id !== null) {
                $user->aprendiz()->dissociate();
            }
            return redirect()->route('users.index');
        }
    }

    public function addRolAprendiz()
    {
        return view('users.addRolAprendiz');
    }

    public function addRolInstructor()
    {
        return view('users.addRolInstructor');
    }

    public function storeRolAprendiz(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'aprendiz_id' => ['required', 'exists:aprendizs,id'],
        ]);

        //Hace la asociación entre la llave foranea y la llave primaria de las tablas
        $user->aprendiz()->associate($validatedData['aprendiz_id']);

        //Si el usuario anteriormente era un instructor, eliminamos dicha asociación
        if ($user->instructor_id !== null) {
            $user->instructor()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function storeRolInstructor(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'instructor_id' => ['required', 'exists:instructors,id'],
        ]);

        //Hace la asociación entre la llave foranea y la llave primaria de las tablas
        $user->instructor()->associate($validatedData['instructor_id']);

        //Si el usuario anteriormente era un estudiante, eliminamos dicha asociación
        if ($user->aprendiz_id !== null) {
            $user->aprendiz()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }
}
