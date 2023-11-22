<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAprendizRequest;
use App\Http\Requests\StoreAprendizRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Aprendiz;
use App\Models\Ficha;

class AprendizController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $aprendizs = Aprendiz::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->whereHas('ficha', function (Builder $subquery) use ($search) {
                    $subquery->where('fic_codigo', 'like', "%{$search}%");
                })->orWhere('apr_identificacion', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('aprendizs.index', compact('aprendizs'));
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $fichas = Ficha::with('programa')
            ->join('programas', 'fichas.programa_id', '=', 'programas.id')
            ->orderBy('programas.pro_nombre')
            ->orderBy('fichas.fic_codigo')
            ->get();
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
        $fichas = Ficha::with('programa')
            ->join('programas', 'fichas.programa_id', '=', 'programas.id')
            ->orderBy('programas.pro_nombre')
            ->orderBy('fichas.fic_codigo')
            ->get();
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
