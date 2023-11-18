<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Prueba;
use Illuminate\Support\Facades\Storage;

class GesViewController extends Controller
{
    public function revSol(Request $request)
    {
        $solicituds = Solicitud::where('sol_estado', '=', 'Solicitado')
            ->when($request->q, function ($query, $search) {
                $query->where('created_at', 'like', "%{$search}%")
                    ->orWhere('sol_lugar', 'like', "%{$search}%")
                    ->orWhere('sol_motivo', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('gesViews.revSol', compact('solicituds'));
    }


    public function revDet(Solicitud $solicitud)
    {
        $instructors = $solicitud->instructors;
        $aprendizs = $solicitud->aprendizs;
        $articulos = $solicitud->articulos;
        $numerals = $solicitud->numerals;
        $prueba = $solicitud->prueba;
        return view('gesViews.revDet', compact('solicitud', 'instructors', 'aprendizs', 'articulos', 'numerals', 'prueba'));
    }

    public function dowPru(Prueba $prueba)
    {
        $filePath = storage_path('app/public/' . $prueba->pru_url);
        if (file_exists($filePath)) {
            //return response()->file($filePath, $prueba->pru_tipo);
            return Storage::disk('public')->download($prueba->pru_url);
        } else {
            return redirect()->back()->with('error', 'El archivo no existe');
        }
    }
}
