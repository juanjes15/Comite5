<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapituloRequest;
use App\Http\Requests\UpdateCapituloRequest;
use App\Models\Capitulo;

class CapituloController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $capitulos = Capitulo::latest()->paginate(5);
        return view('capitulos.index', compact('capitulos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        return view('capitulos.create');
    }

    //Almacena un recurso recién creado
    public function store(StoreCapituloRequest $request)
    {
        Capitulo::create($request->validated());
        return redirect()->route('capitulos.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Capitulo $capitulo)
    {
        return view('capitulos.edit', compact('capitulo'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateCapituloRequest $request, Capitulo $capitulo)
    {
        $capitulo->update($request->validated());
        return redirect()->route('capitulos.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Capitulo $capitulo)
    {
        $capitulo->delete();
        return redirect()->route('capitulos.index');
    }
}