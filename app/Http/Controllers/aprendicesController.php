<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\regionales;
use Illuminate\Http\Request;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = aprendices::all();

        return view('aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'NumeroDoc' => 'required|integer',
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required|string|max:50',
            'CorreoInstitucional' => 'required|email|max:50',
            'CorreoPersonal' => 'required|email|max:50',
            'Sexo' => 'required|string|max:20',
            'FechaNacimiento' => 'required|date',
            'tbltiposdocumentos_NIS' => 'required|integer',
            'tbleps_NIS' => 'required|integer',
            'tblfichascaracterizacion_NIS' => 'required|integer',
        ]);

        aprendices::create($data);

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz guardado correctamente');
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
