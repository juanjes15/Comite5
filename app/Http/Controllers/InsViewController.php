<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
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
        $solicitud = Solicitud::create($request->validated());

        // Almacena el ID de solicitud en la sesión
        session(['solicitud_id' => $solicitud->id]);

        return redirect()->route('insViews.sol4Ins');
    }
    public function sol4Ins()
    {
        // Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        //Obtenemos el id del gestor que está haciendo la solicitud
        $instructor_id = auth()->user()->instructor->id;

        $instructors = Instructor::orderBy('ins_nombres')->orderBy('ins_apellidos')->get();

        return view('insViews.sol4Ins', compact('solicitud_id', 'instructors', 'instructor_id'));
    }
    public function store4Ins(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'instructor_id.*' => ['required', 'exists:instructors,id'],
        ]);
        // Accede al valor de 'solicitud_id' almacenado en la sesión
        $solicitud_id = session('solicitud_id');

        $instructorIds = $request->input('instructor_id');
        foreach ($instructorIds as $instructorId) {
            // Utiliza la función insert para crear una entrada en la tabla instructor_solicitud
            DB::table('instructor_solicitud')->insert([
                'instructor_id' => $instructorId,
                'solicitud_id' => $solicitud_id,
            ]);
        }

        return redirect()->route('insViews.sol5Apr');
    }
}
