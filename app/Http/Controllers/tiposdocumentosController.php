<?php

namespace App\Http\Controllers;


use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class tiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tiposdocumentos = tiposdocumentos::all();

        return view('tiposdocumentos.index', compact('tiposdocumentos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposdocumentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Denominacion' => 'required',
            'Observaciones' => 'required',
        ]);

        tiposdocumentos::create($request->all());

        return redirect()
            ->route('tiposdocumentos.index')
            ->with('success', 'Tipo de documento creado correctamente');
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


