<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UpdateFichaRequest;
use App\Http\Requests\StoreFichaRequest;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Ficha;

class FichaController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $fichas = Ficha::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->whereHas('programa', function (Builder $subquery) use ($search) {
                    $subquery->where('pro_nombre', 'like', "%{$search}%");
                })->orWhere('fic_codigo', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('fichas.index', compact('fichas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $programas = Programa::orderBy('pro_nombre')->get();
        $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();
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
        $programas = Programa::orderBy('pro_nombre')->get();
        $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();
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
