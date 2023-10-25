<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class InsViewController extends Controller
{
    public function sol1Ini()
    {
        return view('insViews.sol1Ini');
    }
    public function sol2Inf()
    {
        return view('insViews.sol2Inf');
    }
    public function store2Inf(Request $request)
    {
        $solicitud = Solicitud::create($request->all());

        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);

        return redirect()->route('insViews.sol3Ins');
    }
    public function sol3Ins()
    {
        return view('insViews.sol3Ins');
    }
}
