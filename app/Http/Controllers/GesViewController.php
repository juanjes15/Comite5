<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComiteRequest;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Comite;
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

    public function solNo(Solicitud $solicitud)
    {
        $solicitud->sol_estado = 'Rechazado';
        $solicitud->save();
        return redirect()->route('gesViews.revSol');
    }
    public function solSi(Solicitud $solicitud)
    {
        return view('gesViews.comIni', compact('solicitud'));
    }
    public function comIni(StoreComiteRequest $request)
    {
        $comite = Comite::create($request->validated());
        $solicitud = $comite->solicitud;
        $solicitud->sol_estado = 'Aceptado';
        $solicitud->save();
        return redirect()->route('gesViews.revSol');
    }
}
