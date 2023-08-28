<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;

class InstructorController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $instructors = Instructor::latest()->paginate(5);
        return view('instructors.index', compact('instructors'))->with('i', (request()->input('page', 1) - 1) * 5);
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