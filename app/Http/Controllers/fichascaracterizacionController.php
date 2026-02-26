<?php

namespace App\Http\Controllers;

use App\Models\fichascaracterizacion;
use Illuminate\Http\Request;

class fichascaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichascaracterizacion = fichascaracterizacion::all();

        return view('fichascaracterizacion.index', compact('fichascaracterizacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fichascaracterizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Observaciones' => 'required|string|max:200',
            'tblcentroformacion_NIS' => 'required|integer',
            'tblprogramasdeformacion_NIS' => 'required|integer',
        ]);

        fichascaracterizacion::create($request->all());

        return redirect()
            ->route('fichascaracterizacion.index')
            ->with('success', 'Ficha creada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
