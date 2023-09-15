<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $instructors = Instructor::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->where('ins_identificacion', 'like', "%{$search}%")
                    ->orWhere('ins_nombres', 'like', "%{$search}%")
                    ->orWhere('ins_apellidos', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('instructors.index', compact('instructors'));
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        return view('instructors.create');
    }

    //Almacena un recurso recién creado
    public function store(StoreInstructorRequest $request)
    {
        Instructor::create($request->validated());
        return redirect()->route('instructors.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());
        return redirect()->route('instructors.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index');
    }
}
