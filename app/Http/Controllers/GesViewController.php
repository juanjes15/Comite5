<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComiteRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Solicitud;
use App\Models\Aprendiz;
use App\Models\Comite;
use App\Models\Prueba;

class GesViewController extends Controller
{
    public function solAll(Request $request)
    {
        $solicituds = Solicitud::where('sol_estado', '=', 'Solicitado')
            ->when($request->q, function ($query, $search) {
                $query->where('created_at', 'like', "%{$search}%")
                    ->orWhere('sol_lugar', 'like', "%{$search}%")
                    ->orWhere('sol_motivo', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('gesViews.solAll', compact('solicituds'));
    }


    public function solDet(Solicitud $solicitud)
    {
        $instructors = $solicitud->instructors;
        $aprendizs = $solicitud->aprendizs;
        $articulos = $solicitud->articulos;
        $numerals = $solicitud->numerals;
        $prueba = $solicitud->prueba;
        return view('gesViews.solDet', compact('solicitud', 'instructors', 'aprendizs', 'articulos', 'numerals', 'prueba'));
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
        return redirect()->route('gesViews.solAll');
    }
    public function solSi(Solicitud $solicitud)
    {
        return view('gesViews.comIni', compact('solicitud'));
    }
    public function comIni(StoreComiteRequest $request)
    {
        $comite = Comite::create($request->validated());
        //Cambiamos la solicitud a Aceptado
        $solicitud = $comite->solicitud;
        $solicitud->sol_estado = 'Aceptado';
        $solicitud->save();
        //TODO: Enviar email/notificación
        //A cada aprendiz en esta solicitud se le aumenta su número de comités asistidos
        $aprendizs = $solicitud->aprendizs;
        foreach ($aprendizs as $aprendiz) {
            $aprendiz->increment('apr_numComites');
        }
        return redirect()->route('gesViews.solAll');
    }

    public function comAll(Request $request)
    {
        $comites = Comite::where('com_estado', '=', 'Iniciado')
            ->when($request->q, function ($query, $search) {
                $query->where('com_fecha', 'like', "%{$search}%")
                    ->orWhere('com_lugar', 'like', "%{$search}%");
            })
            ->orderBy('com_fecha', 'asc')
            ->paginate(5);

        return view('gesViews.comAll', compact('comites'));
    }
    public function comDet(Comite $comite)
    {
        $instructors = $comite->solicitud->instructors;
        $aprendizs = $comite->solicitud->aprendizs;
        $articulos = $comite->solicitud->articulos;
        $numerals = $comite->solicitud->numerals;
        $prueba = $comite->solicitud->prueba;
        return view('gesViews.comDet', compact('comite', 'instructors', 'aprendizs', 'articulos', 'numerals', 'prueba'));
    }
    public function comAls(Request $request)
    {
        $comites = Comite::where('com_estado', '=', 'En sesion')
            ->when($request->q, function ($query, $search) {
                $query->where('com_fecha', 'like', "%{$search}%")
                    ->orWhere('com_lugar', 'like', "%{$search}%");
            })
            ->orderBy('com_fecha', 'asc')
            ->paginate(5);

        return view('gesViews.comAls', compact('comites'));
    }
    public function comSes(Comite $comite)
    {
        $comite->update(['com_estado' => 'En sesion']);
        $instructors = $comite->solicitud->instructors;
        $aprendizs = $comite->solicitud->aprendizs;
        $articulos = $comite->solicitud->articulos;
        $numerals = $comite->solicitud->numerals;
        $prueba = $comite->solicitud->prueba;
        return view('gesViews.comSes', compact('comite', 'instructors', 'aprendizs', 'articulos', 'numerals', 'prueba'));
    }
    public function comIns(Request $request, Comite $comite, Instructor $instructor)
    {
        $request->validate([
            'is_descargo' => ['required', 'string'],
        ]);
        $is_descargo = $request->input('is_descargo');

        $solicitud = $comite->solicitud;
        // Obtener la relación entre la solicitud y el instructor
        $relacion = $solicitud->instructors()->where('instructor_id', $instructor->id)->first();
        // Verificar si la relación existe
        if ($relacion) {
            // Modificar el valor de 'is_descargo' en la tabla intermedia
            $relacion->InstructorSolicitud->update(['is_descargo' => $is_descargo]);
        }
        return redirect()->route('gesViews.comSes', $comite);
    }
    public function comApr(Request $request, Comite $comite, Aprendiz $aprendiz)
    {
        $request->validate([
            'as_descargo' => ['required', 'string'],
        ]);
        $as_descargo = $request->input('as_descargo');

        $solicitud = $comite->solicitud;
        // Obtener la relación entre la solicitud y el aprendiz
        $relacion = $solicitud->aprendizs()->where('aprendiz_id', $aprendiz->id)->first();
        // Verificar si la relación existe
        if ($relacion) {
            // Modificar el valor de 'as_descargo' en la tabla intermedia
            $relacion->AprendizSolicitud->update(['as_descargo' => $as_descargo]);
        }
        return redirect()->route('gesViews.comSes', $comite);
    }
    //TODO: Descargos de usuarios
    public function comRec(Request $request, Comite $comite)
    {
        $request->validate([
            'com_recomendacion' => ['required', 'string'],
        ]);
        $com_recomendacion = $request->input('com_recomendacion');
        $comite->update(['com_recomendacion' => $com_recomendacion]);
        return redirect()->route('gesViews.comSes', $comite);
    }
    public function comFin(Comite $comite)
    {
        $comite->update(['com_estado' => 'Finalizado']);
        //TODO: Generar Acta
        return redirect()->route('gesViews.comAlf', $comite);
    }
    public function comAlf(Request $request)
    {
        $comites = Comite::where('com_estado', '=', 'Finalizado')
            ->when($request->q, function ($query, $search) {
                $query->where('com_fecha', 'like', "%{$search}%")
                    ->orWhere('com_lugar', 'like', "%{$search}%");
            })
            ->orderBy('com_fecha', 'asc')
            ->paginate(5);

        return view('gesViews.comAlf', compact('comites'));
    }
}
