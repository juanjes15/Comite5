<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSolicitudRequest;
use App\Http\Requests\StoreSolicitudRequest;
use App\Http\Requests\UpdatePruebaRequest;
use App\Http\Requests\StorePruebaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Solicitud;
use App\Models\Articulo;
use App\Models\Capitulo;
use App\Models\Aprendiz;
use App\Models\Numeral;
use App\Models\Prueba;
use App\Models\Ficha;

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
        //Validación de los datos del formulario
        $request->validate([
            'ficha_id' => ['required', 'exists:fichas,id'],
        ]);

        //Almacena el ID de la ficha en la sesión
        session(['ficha_id' => $request->input('ficha_id')]);

        return redirect()->route('insViews.sol3Inf');
    }

    public function sol3Inf()
    {
        return view('insViews.sol3Inf');
    }
    public function store3Inf(StoreSolicitudRequest $request)
    {
        $solicitud = Solicitud::create($request->validated());

        //Almacena el ID de solicitud en la sesión
        session(['solicitud_id' => $solicitud->id]);

        return redirect()->route('insViews.sol4Ins');
    }

    public function sol4Ins()
    {
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        //Obtenemos el id del gestor que está haciendo la solicitud
        $instructor_id = auth()->user()->instructor->id;

        $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();

        return view('insViews.sol4Ins', compact('solicitud_id', 'instructors', 'instructor_id'));
    }
    public function store4Ins(Request $request)
    {
        //Validación de los datos del formulario
        $request->validate([
            'instructor_id.*' => ['required', 'exists:instructors,id'],
        ]);
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        $instructorIds = $request->input('instructor_id');
        foreach ($instructorIds as $instructorId) {
            //Utiliza la función insert para crear una entrada en la tabla instructor_solicitud
            DB::table('instructor_solicitud')->insert([
                'instructor_id' => $instructorId,
                'solicitud_id' => $solicitud_id,
            ]);
        }

        return redirect()->route('insViews.sol5Apr');
    }

    public function sol5Apr()
    {
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        //Accede al valor de 'ficha_id' almacenado en la sesión
        $ficha_id = session('ficha_id');
        $ficha = Ficha::find($ficha_id);

        //Obtenemos los aprendices de la ficha
        $aprendizs = $ficha->aprendizs;

        return view('insViews.sol5Apr', compact('solicitud_id', 'aprendizs'));
    }
    public function store5Apr(Request $request)
    {
        //Validación de los datos del formulario
        $request->validate([
            'aprendiz_id.*' => ['required', 'exists:aprendizs,id'],
        ]);
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        $aprendizIds = $request->input('aprendiz_id');
        foreach ($aprendizIds as $aprendizId) {
            //Utiliza la función insert para crear una entrada en la tabla aprendiz_solicitud
            DB::table('aprendiz_solicitud')->insert([
                'aprendiz_id' => $aprendizId,
                'solicitud_id' => $solicitud_id,
            ]);
        }

        return redirect()->route('insViews.sol6Fal');
    }

    public function sol6Fal()
    {
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');
        $solicitud = Solicitud::find($solicitud_id);

        $capitulos = Capitulo::all();
        //Artículos y Numerales ya asociados a la solicitud
        $articulos = $solicitud->articulos;
        $numerals = $solicitud->numerals;

        return view('insViews.sol6Fal', compact('solicitud_id', 'capitulos', 'articulos', 'numerals'));
    }
    public function store6Fal(Request $request)
    {
        //Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');
        $solicitud = Solicitud::find($solicitud_id);

        //Si es null numeral_id, significa que es un articulo sin numerales, relacionamos con articulos
        if ($request->input('numeral_id') == null) {
            $request->validate([
                'articulo_id' => ['required', 'exists:articulos,id'],
            ]);
            $articulo_id = $request->input('articulo_id');
            $articulo = Articulo::find($articulo_id);
            $articulo->solicituds()->save($solicitud);
        } else { //Si el formulario envió numeral_id (es un numeral), relacionamos con numeral
            $request->validate([
                'numeral_id' => ['required', 'exists:numerals,id'],
            ]);
            $numeral_id = $request->input('numeral_id');
            $numeral = Numeral::find($numeral_id);
            $numeral->solicituds()->save($solicitud);
        }

        return redirect()->route('insViews.sol6Fal');
    }
    public function articulos(Request $request)
    {
        if (isset($request->texto)) {
            $articulos = Articulo::where('capitulo_id', $request->texto)->get();
            return response()->json([
                'lista' => $articulos,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function numerals(Request $request)
    {
        if (isset($request->texto)) {
            $numerals = Numeral::where('articulo_id', $request->texto)->get();
            return response()->json([
                'lista' => $numerals,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function sol7Pru()
    {
        $solicitud_id = session('solicitud_id');
        return view('insViews.sol7Pru', compact('solicitud_id'));
    }
    public function store7Pru(StorePruebaRequest $request)
    {
        //Obtiene los datos validados del request
        $validatedData = $request->validated();

        //Guardo el archivo en el disco public, carpeta pruebas
        $path = Storage::disk('public')->put('pruebas', $request->file('pru_url'));

        //Cambia el path del archivo por el nuevo en los datos validados
        $validatedData['pru_url'] = $path;

        Prueba::create($validatedData);

        return redirect()->route('insViews.sol1Ini');
    }

    public function revSol(Request $request)
    {
        $fichas = auth()->user()->instructor->fichas;

        $solicituds = Solicitud::whereHas('aprendizs', function ($query) use ($fichas) {
            $query->whereIn('ficha_id', $fichas->pluck('id'));
        })
            ->where('sol_estado', '=', 'Solicitado')
            ->when($request->q, function ($query, $search) {
                $query->where('created_at', 'like', "%{$search}%")
                    ->orWhere('sol_lugar', 'like', "%{$search}%")
                    ->orWhere('sol_motivo', 'like', "%{$search}%");
            })
            ->paginate(5);

        return view('insViews.revSol', compact('solicituds'));
    }

    public function revDet(Solicitud $solicitud)
    {
        $instructors = $solicitud->instructors;
        $aprendizs = $solicitud->aprendizs;
        $articulos = $solicitud->articulos;
        $numerals = $solicitud->numerals;
        $prueba = $solicitud->prueba;
        return view('insViews.revDet', compact('solicitud', 'instructors', 'aprendizs', 'articulos', 'numerals', 'prueba'));
    }
    public function updInf(UpdateSolicitudRequest $request, Solicitud $solicitud)
    {
        $solicitud->update($request->validated());
        return redirect()->back();
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
    public function updPru(UpdatePruebaRequest $request, Prueba $prueba)
    {
        // Obtiene los datos validados del request
        $validatedData = $request->validated();

        // Verifica si se proporcionó un nuevo archivo
        if ($request->hasFile('pru_url')) {
            // Elimina el archivo anterior
            Storage::disk('public')->delete($prueba->pru_url);

            // Guarda el nuevo archivo en el disco public, carpeta pruebas
            $path = Storage::disk('public')->put('pruebas', $request->file('pru_url'));

            // Cambia el path del archivo por el nuevo en los datos validados
            $validatedData['pru_url'] = $path;
        }

        // Actualiza los demás campos
        $prueba->update($validatedData);

        return redirect()->back();
    }

    public function revIns(Solicitud $solicitud)
    {
        $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();
        $instructors2 = $solicitud->instructors;

        return view('insViews.revIns', compact('solicitud', 'instructors', 'instructors2'));
    }
    public function storeIns(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'instructor_id' => ['required', 'exists:instructors,id'],
        ]);
        $instructor_id = $request->input('instructor_id');
        $instructor = Instructor::find($instructor_id);
        $instructor->solicituds()->save($solicitud);

        return redirect()->route('insViews.revIns', $solicitud);
    }
    public function delIns(Solicitud $solicitud, Instructor $instructor)
    {
        $instructor->solicituds()->detach($solicitud);
        return redirect()->route('insViews.revIns', $solicitud);
    }

    public function revApr(Solicitud $solicitud)
    {
        $aprendizs2 = $solicitud->aprendizs;
        //La ficha a la pertenece el primer aprendiz citado a comité
        $ficha = $aprendizs2[0]->ficha;
        //Todos los aprendices de la anterior ficha
        $aprendizs = $ficha->aprendizs;

        return view('insViews.revApr', compact('solicitud', 'aprendizs', 'aprendizs2'));
    }
    public function storeApr(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'aprendiz_id' => ['required', 'exists:aprendizs,id'],
        ]);
        $aprendiz_id = $request->input('aprendiz_id');
        $aprendiz = Aprendiz::find($aprendiz_id);
        $aprendiz->solicituds()->save($solicitud);
        return redirect()->route('insViews.revApr', $solicitud);
    }
    public function delApr(Solicitud $solicitud, Aprendiz $aprendiz)
    {
        $aprendiz->solicituds()->detach($solicitud);
        return redirect()->route('insViews.revApr', $solicitud);
    }

    public function revFal(Solicitud $solicitud)
    {
        $capitulos = Capitulo::all();
        $articulos = $solicitud->articulos;
        $numerals = $solicitud->numerals;

        return view('insViews.revFal', compact('solicitud', 'capitulos', 'articulos', 'numerals'));
    }
    public function storeFal(Request $request, Solicitud $solicitud)
    {
        //Si es null numeral_id, significa que es un articulo sin numerales, relacionamos con articulos
        if ($request->input('numeral_id') == null) {
            $request->validate([
                'articulo_id' => ['required', 'exists:articulos,id'],
            ]);
            $articulo_id = $request->input('articulo_id');
            $articulo = Articulo::find($articulo_id);
            $articulo->solicituds()->save($solicitud);
        } else { //Si el formulario envió numeral_id (es un numeral), relacionamos con numeral
            $request->validate([
                'numeral_id' => ['required', 'exists:numerals,id'],
            ]);
            $numeral_id = $request->input('numeral_id');
            $numeral = Numeral::find($numeral_id);
            $numeral->solicituds()->save($solicitud);
        }

        return redirect()->route('insViews.revFal', $solicitud);
    }
    public function revArt(Solicitud $solicitud, Articulo $articulo)
    {
        $articulo->solicituds()->detach($solicitud);
        return redirect()->route('insViews.revFal', $solicitud);
    }
    public function revNum(Solicitud $solicitud, Numeral $numeral)
    {
        $numeral->solicituds()->detach($solicitud);
        return redirect()->route('insViews.revFal', $solicitud);
    }
    
    public function revDel(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('insViews.revSol');
    }
}
