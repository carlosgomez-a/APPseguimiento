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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TipoDoc' => 'required',
            'NumeroDoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
        ]);

        instructores::create($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instructore = instructores::findOrFail($id);
        return view('instructores.show', compact('instructore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instructore = instructores::findOrFail($id);
        return view('instructores.edit', compact('instructore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombres' => 'required',
            'Apellidos' => 'required',
        ]);

        $instructore = instructores::findOrFail($id);
        $instructore->update($request->all());

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructore = instructores::findOrFail($id);
        $instructore->delete();

        return redirect()->route('instructores.index')
            ->with('success', 'Instructor eliminado correctamente.');
    }
}
