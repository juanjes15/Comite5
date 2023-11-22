<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNumeralRequest;
use App\Http\Requests\StoreNumeralRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Numeral;

class NumeralController extends Controller
{
    //Muestra un listado del recurso
    public function index(Request $request)
    {
        $numerals = Numeral::query()
            ->when($request->q, function (Builder $query, $search) {
                $query->whereHas('articulo', function (Builder $subquery) use ($search) {
                    $subquery->where('art_numero', 'like', "%{$search}%");
                })->orWhere('num_descripcion', 'like', "%{$search}%")
                    ->orWhere('num_categoria', 'like', "%{$search}%")
                    ->orWhere('num_tipoFalta', 'like', "%{$search}%");
            })
            ->paginate(5);
        return view('numerals.index', compact('numerals'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Muestra el formulario de creación de un nuevo recurso
    public function create()
    {
        $articulos = Articulo::orderBy('art_numero')->get();
        return view('numerals.create', compact('articulos'));
    }

    //Almacena un recurso recién creado
    public function store(StoreNumeralRequest $request)
    {
        Numeral::create($request->validated());
        return redirect()->route('numerals.index');
    }

    //Muestra el formulario para editar el recurso especificado
    public function edit(Numeral $numeral)
    {
        $articulos = Articulo::orderBy('art_numero')->get();
        return view('numerals.edit', compact('numeral', 'articulos'));
    }

    //Actualiza el recurso especificado en el almacenamiento
    public function update(UpdateNumeralRequest $request, Numeral $numeral)
    {
        $numeral->update($request->validated());
        return redirect()->route('numerals.index');
    }

    //Elimina el recurso especificado del almacenamiento
    public function destroy(Numeral $numeral)
    {
        $numeral->delete();
        return redirect()->route('numerals.index');
    }
}
