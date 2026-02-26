<?php

namespace App\Http\Controllers;


use App\Models\centroformacion;
use Illuminate\Http\Request;

class centroformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $centroformacion = centroformacion::all();

        return view('centroformacion.index', compact('centroformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('centroformacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Observaciones' => 'required',
            'Direccion' => 'required',
            'tblregionales_NIS' => 'required',
        ]);

        centroformacion::create($request->all());

        return redirect()
            ->route('centroformacion.index')
            ->with('success', 'Centro de formación creado correctamente');
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


