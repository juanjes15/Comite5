<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFichaRequest;
use App\Http\Requests\UpdateFichaRequest;
use App\Models\Ficha;
use App\Models\Programa;
use App\Models\Instructor;

class FichaController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $fichas = Ficha::latest()->paginate(5);
        return view('fichas.index', compact('fichas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $programas = Programa::all();
        $instructors = Instructor::all();
        return view('fichas.create', compact('programas', 'instructors'));
    }

    //Almacena un recurso recién creado
    public function store(StoreFichaRequest $request)
    {
        Ficha::create($request->validated());
        return redirect()->route('fichas.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Ficha $ficha)
    {
        $programas = Programa::all();
        $instructors = Instructor::all();
        return view('fichas.edit', compact('ficha', 'programas', 'instructors'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateFichaRequest $request, Ficha $ficha)
    {
        $ficha->update($request->validated());
        return redirect()->route('fichas.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Ficha $ficha)
    {
        $ficha->delete();
        return redirect()->route('fichas.index');
    }
}