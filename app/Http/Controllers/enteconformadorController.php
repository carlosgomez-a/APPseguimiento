<?php

namespace App\Http\Controllers;

use App\Models\enteconformador;
use Illuminate\Http\Request;

class enteconformadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enteconformador = enteconformador::all();

        return view('enteconformador.index', compact('enteconformador'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enteconformador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TipoDoc' => 'required',
            'NumeroDoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email',
        ]);

        enteconformador::create($request->all());

        return redirect()
            ->route('enteconformador.index')
            ->with('success', 'Ente conformador creado correctamente');
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
