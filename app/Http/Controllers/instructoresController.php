<?php

namespace App\Http\Controllers;

use App\Models\instructores;
use Illuminate\Http\Request;

class instructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = instructores::all();
        return view('instructores.index', compact('instructores'));
    }

    public function create()
    {
        return view('instructores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TipoDoc' => 'required',
            'NumeroDoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
            'CorreoPersonal' => 'required',
            'Sexo' => 'required',
            'FechaNacimiento' => 'required',
            'tbltiposdocumentos_NIS' => 'required',
            'tbleps_NIS' => 'required',
            'tblrolesadministrativos_NIS' => 'required',
        ]);

        instructores::create($request->all());

        return redirect()
            ->route('instructores.index')
            ->with('success', 'Instructor creado correctamente');
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
