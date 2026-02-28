<?php

namespace App\Http\Controllers;

use App\Models\centroformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class centroformacionController extends Controller
{
    public function index()
    {
        $centros = centroformacion::all();
        return view('centroformacion.index', compact('centros'));
    }

    public function create()
    {
        return view('centroformacion.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Codigo' => 'required|string|max:50',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'nullable|string',
            'Direccion' => 'required|string|max:200',
            'tblregionales_NIS' => 'required|integer',
            'CentroformacionPDF' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('CentroformacionPDF')) {
            $nombreArchivo = 'centro_' . time() . '.' . $request->file('CentroformacionPDF')->extension();
            // Guardamos en la subcarpeta pdfs_centros
            $request->file('CentroformacionPDF')->storeAs('pdfs_centros', $nombreArchivo, 'public');
            $data['CentroformacionPDF'] = $nombreArchivo;
        }

        centroformacion::create($data);

        return redirect()->route('centroformacion.index')
            ->with('success', 'Centro de formación guardado correctamente');
    }

    public function show($id)
    {
        $centro = centroformacion::findOrFail($id);
        return view('centroformacion.show', compact('centro'));
    }

    public function edit($id)
    {
        $centro = centroformacion::findOrFail($id);
        return view('centroformacion.edit', compact('centro'));
    }

    public function update(Request $request, $id)
    {
        $centro = centroformacion::findOrFail($id);

        $data = $request->validate([
            'Codigo' => 'required|string|max:50',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'nullable|string',
            'Direccion' => 'required|string|max:200',
            'tblregionales_NIS' => 'required|integer',
            'CentroformacionPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('CentroformacionPDF')) {
            // Eliminar archivo anterior si existe
            if ($centro->CentroformacionPDF) {
                Storage::disk('public')->delete('pdfs_centros/' . $centro->CentroformacionPDF);
            }

            $nombreArchivo = 'centro_' . time() . '.' . $request->file('CentroformacionPDF')->extension();
            $request->file('CentroformacionPDF')->storeAs('pdfs_centros', $nombreArchivo, 'public');
            $data['CentroformacionPDF'] = $nombreArchivo;
        }

        $centro->update($data);

        return redirect()->route('centroformacion.index')
            ->with('success', 'Centro actualizado correctamente');
    }

    public function destroy($id)
    {
        $centro = centroformacion::findOrFail($id);

        if ($centro->CentroformacionPDF) {
            Storage::disk('public')->delete('pdfs_centros/' . $centro->CentroformacionPDF);
        }

        $centro->delete();

        return redirect()->route('centroformacion.index')
            ->with('success', 'Centro eliminado correctamente');
    }
}
