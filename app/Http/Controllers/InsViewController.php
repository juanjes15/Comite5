<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Capitulo;
use App\Models\Ficha;
use App\Models\Instructor;
use App\Models\Numeral;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudRequest;
use Illuminate\Support\Facades\DB;

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
}
