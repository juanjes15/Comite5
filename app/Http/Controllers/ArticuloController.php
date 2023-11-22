<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArticuloRequest;
use App\Http\Requests\StoreArticuloRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Capitulo;

class ArticuloController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $articulos = Articulo::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->whereHas('capitulo', function (Builder $subquery) use ($search) {
                    $subquery->where('cap_numero', 'like', "%{$search}%");
                })->orWhere('art_numero', 'like', "%{$search}%")
                    ->orWhere('art_descripcion', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('articulos.index', compact('articulos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $capitulos = Capitulo::all();
        return view('articulos.create', compact('capitulos'));
    }

    //Almacena un recurso recién creado
    public function store(StoreArticuloRequest $request)
    {
        Articulo::create($request->validated());
        return redirect()->route('articulos.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Articulo $articulo)
    {
        $capitulos = Capitulo::all();
        return view('articulos.edit', compact('articulo', 'capitulos'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $articulo->update($request->validated());
        return redirect()->route('articulos.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
