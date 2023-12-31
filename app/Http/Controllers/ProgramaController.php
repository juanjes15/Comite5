<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProgramaRequest;
use App\Http\Requests\StoreProgramaRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Programa;

class ProgramaController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $programas = Programa::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->where('pro_nombre', 'like', "%{$search}%")
                    ->orWhere('pro_codigo', 'like', "%{$search}%")
                    ->orWhere('pro_nivelFormacion', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('programas.index', compact('programas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        return view('programas.create');
    }

    //Almacena un recurso recién creado
    public function store(StoreProgramaRequest $request)
    {
        Programa::create($request->validated());
        return redirect()->route('programas.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Programa $programa)
    {
        return view('programas.edit', compact('programa'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateProgramaRequest $request, Programa $programa)
    {
        $programa->update($request->validated());
        return redirect()->route('programas.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('programas.index');
    }
}
