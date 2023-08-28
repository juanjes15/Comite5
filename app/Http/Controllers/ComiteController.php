<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComiteRequest;
use App\Http\Requests\UpdateComiteRequest;
use App\Models\Comite;
use App\Models\Solicitud;

class ComiteController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $comites = Comite::latest()->paginate(5);
        return view('comites.index', compact('comites'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $solicituds = Solicitud::all();
        return view('comites.create', compact('solicituds'));
    }

    //Almacena un recurso recién creado
    public function store(StoreComiteRequest $request)
    {
        Comite::create($request->validated());
        return redirect()->route('comites.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Comite $comite)
    {
        $solicituds = Solicitud::all();
        return view('comites.edit', compact('comite', 'solicituds'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateComiteRequest $request, Comite $comite)
    {
        $comite->update($request->validated());
        return redirect()->route('comites.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Comite $comite)
    {
        $comite->delete();
        return redirect()->route('comites.index');
    }
}