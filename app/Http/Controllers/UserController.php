<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
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

    /*
    //Muestra el formulario de creación de un nuevo recurso
    public function create(): View
    {
        return view('auth.register');
    }

    //Almacena un recurso recién creado
    //No está siendo usado
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('users.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->route('users.index');
    }
    */

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
            $aprendizs = Aprendiz::all();
            return view('users.addRolAprendiz', compact('user', 'aprendizs'));
        } else if ($user->rol === 'Instructor') {
            $instructors = Instructor::all();
            return view('users.addRolInstructor', compact('user', 'instructors'));
        } else {
            return redirect()->route('users.index');
        }
    }

    public function addRolAprendiz(User $user)
    {
        return view('users.addRolAprendiz', compact('user'));
    }

    public function addRolInstructor(User $user)
    {
        return view('users.addRolInstructor', compact('user'));
    }

    public function storeRolAprendiz(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'aprendiz_id' => 'required',
        ]);

        $user->aprendiz()->associate($validatedData['aprendiz_id']);
        if ($user->instructor_id !== null) {
            $user->instructor()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }

    public function storeRolInstructor(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'instructor_id' => 'required',
        ]);

        $user->instructor()->associate($validatedData['instructor_id']);
        if ($user->aprendiz_id !== null) {
            $user->aprendiz()->dissociate();
        }
        $user->save();

        return redirect()->route('users.index');
    }
}
