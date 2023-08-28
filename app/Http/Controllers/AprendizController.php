<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAprendizRequest;
use App\Http\Requests\UpdateAprendizRequest;
use App\Models\Aprendiz;
use App\Models\Ficha;

class AprendizController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $aprendizs = Aprendiz::latest()->paginate(5);
        return view('aprendizs.index', compact('aprendizs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $fichas = Ficha::all();
        return view('aprendizs.create', compact('fichas'));
    }

    //Almacena un recurso recién creado
    public function store(StoreAprendizRequest $request)
    {
        Aprendiz::create($request->validated());
        return redirect()->route('aprendizs.index');
    }

    //Muestra el recurso especificado
    public function show(Aprendiz $aprendiz)
    {
        //
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Aprendiz $aprendiz)
    {
        $fichas = Ficha::all();
        return view('aprendizs.edit', compact('aprendiz', 'fichas'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateAprendizRequest $request, Aprendiz $aprendiz)
    {
        $aprendiz->update($request->validated());
        return redirect()->route('aprendizs.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();
        return redirect()->route('aprendizs.index');
    }
}