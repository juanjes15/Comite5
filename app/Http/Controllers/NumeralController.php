<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumeralRequest;
use App\Http\Requests\UpdateNumeralRequest;
use App\Models\Articulo;
use App\Models\Numeral;

class NumeralController extends Controller
{
    //Muestra un listado del recurso
    public function index()
    {
        $numerals = Numeral::latest()->paginate(5);
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
