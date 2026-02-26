<?php

namespace App\Http\Controllers;

use App\Models\alternativasep;
use Illuminate\Http\Request;


class
alternativasepController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternativasep = alternativasep::all();
        return view('alternativasep.index', compact('alternativasep'));
    }

    public function create()
    {
        return view('alternativasep.create');
    }

    public function store(Request $request)
    {
        // 1. Validamos incluyendo el nuevo campo del PDF
        $data = $request->validate([
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'AlternativasepPDF' => 'required|mimes:pdf|max:200' // 'required' o 'nullable' según prefieras
        ]);

        // 2. Verificamos si se subió el archivo
        if ($request->hasFile('AlternativasepPDF')) {

            // Creamos el nombre con el formato: cam_ + marca de tiempo (para que no se repitan)
            $nombreArchivo = 'cam_' . time() . '.' . $request->file('AlternativasepPDF')->extension();

            // Guardamos el archivo en 'storage/app/public/pdfs'
            // Gracias al storage:link, será accesible desde 'public/storage/pdfs'
            $request->file('AlternativasepPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            // Agregamos el nombre del archivo al array de datos para la BD
            $data['AlternativasepPDF'] = $nombreArchivo;
        }

        // 3. Creamos el registro en la base de datos con todos los campos
        \App\Models\alternativasep::create($data);

        return redirect()->route('alternativasep.index')
            ->with('success', 'Registro y PDF guardados correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
