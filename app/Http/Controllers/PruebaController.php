<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePruebaRequest;
use App\Http\Requests\UpdatePruebaRequest;
use App\Models\Prueba;
use App\Models\Solicitud;

class PruebaController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $pruebas = Prueba::latest()->paginate(5);
        return view('pruebas.index', compact('pruebas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $solicituds = Solicitud::all();
        return view('pruebas.create', compact('solicituds'));
    }

    //Almacena un recurso recién creado
    public function store(StorePruebaRequest $request)
    {
        Prueba::create($request->validated());
        return redirect()->route('pruebas.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Prueba $prueba)
    {
        $solicituds = Solicitud::all();
        return view('pruebas.edit', compact('prueba', 'solicituds'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdatePruebaRequest $request, Prueba $prueba)
    {
        $prueba->update($request->validated());
        return redirect()->route('pruebas.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Prueba $prueba)
    {
        $prueba->delete();
        return redirect()->route('pruebas.index');
    }
}