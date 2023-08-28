<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdateSolicitudRequest;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $solicituds = Solicitud::latest()->paginate(5);
        return view('solicituds.index', compact('solicituds'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        return view('solicituds.create');
    }

    //Almacena un recurso recién creado
    public function store(StoreSolicitudRequest $request)
    {
        Solicitud::create($request->validated());
        return redirect()->route('solicituds.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Solicitud $solicitud)
    {
        return view('solicituds.edit', compact('solicitud'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateSolicitudRequest $request, Solicitud $solicitud)
    {
        $solicitud->update($request->validated());
        return redirect()->route('solicituds.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicituds.index');
    }
}