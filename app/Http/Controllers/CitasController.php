<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $citas = Citas::all();
        // return view('citas.index', compact('citas'));
        $citas = Citas::all();
        return Inertia::render('Citas/Index', ['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Citas/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required',
            'nombre_donante' => 'required',
            'email_donante' => 'required|email',
            'documento_donante' => 'required',
            'n_documento_donante' => 'required',
            'telefono_donante' => 'required',
            'fecha_nac_donante' => 'required|date',
            'direccion_donante' => 'required',
            'estado_civil_donante' => 'required',
            'grado_instruccion_donante' => 'required',
            'n_documento_paciente' => 'required',
            'nombre_paciente' => 'required',
            'hospital_paciente' => 'required',
        ]);

        Citas::create($request->all());
        return Redirect::route('cita.create')->with('success', 'Cita creada satisfactoriamente.');
        // return redirect()->route('citas.index')
        //     ->with('success', 'Cita creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $cita)
    {
        return view('citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $cita)
    {
        $request->validate([
            'fecha_cita' => 'required|date',
            'hora_cita' => 'required',
            'nombre_donante' => 'required',
            'email_donante' => 'required|email',
            'documento_donante' => 'required',
            'n_documento_donante' => 'required',
            'telefono_donante' => 'required',
            'fecha_nac_donante' => 'required|date',
            'direccion_donante' => 'required',
            'estado_civil_donante' => 'required',
            'grado_instruccion_donante' => 'required',
            'n_documento_paciente' => 'required',
            'nombre_paciente' => 'required',
            'hospital_paciente' => 'required',
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita actualizada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $cita)
    {
        $cita->delete();

        return redirect()->route('citas.index')
            ->with('success', 'Cita eliminada satisfactoriamente.');
    }
}
