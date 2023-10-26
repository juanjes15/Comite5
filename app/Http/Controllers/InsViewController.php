<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudRequest;

class InsViewController extends Controller
{
    public function sol1Ini()
    {
        return view('insViews.sol1Ini');
    }
    public function sol2Fic()
    {
        //Obtenemos las fichas en las que es Gestor el Instructor logueado actualmente
        $fichas = auth()->user()->instructor->fichas;
        return view('insViews.sol2Fic', compact('fichas'));
    }
    public function store2Fic(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'ficha_id' => ['required', 'exists:fichas,id'],
        ]);

        // Almacena el ID de la ficha en la sesión
        session(['ficha_id' => $request->input('ficha_id')]);

        return redirect()->route('insViews.sol3Inf');
    }
    public function sol3Inf()
    {
        return view('insViews.sol3Inf');
    }
    public function store3Inf(StoreSolicitudRequest $request)
    {
        $solicitud = Solicitud::create($request->all());

        // Almacena el ID de solicitud en la sesión
        session(['solicitud_id' => $solicitud->id]);

        return redirect()->route('insViews.sol4Ins');
    }
    public function sol4Ins()
    {
        return view('insViews.sol4Ins');
    }
}
