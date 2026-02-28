<?php

namespace App\Http\Controllers;

use App\Models\fichascaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fichascaracterizacionController extends Controller
{
    public function index()
    {
        $fichas = fichascaracterizacion::all();
        return view('fichascaracterizacion.index', compact('fichas'));
    }

    public function create()
    {
        return view('fichascaracterizacion.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Observaciones' => 'nullable|string|max:200',
            'tblcentroformacion_NIS' => 'required|integer',
            'tblprogramasdeformacion_NIS' => 'required|integer',
            'FichascaracterizacionEPS' => 'required|mimes:pdf|max:2048'
        ]);


        //$data['Denominacion']= Crypt::encrypt($data['Denominacion']);
        //ENCRIPTACIÓN DE LA VARIABLE Denominacion DE LA TABLA fichascaracterizacion

        if ($request->hasFile('FichascaracterizacionEPS')) {
            $nombreArchivo = 'ficha_' . time() . '.' . $request->file('FichascaracterizacionEPS')->extension();
            $request->file('FichascaracterizacionEPS')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['FichascaracterizacionEPS'] = $nombreArchivo;
        }

        fichascaracterizacion::create($data);

        return redirect()->route('fichascaracterizacion.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function show($id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);
        return view('fichascaracterizacion.show', compact('ficha'));
    }

    public function edit($id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);
        return view('fichascaracterizacion.edit', compact('ficha'));
    }

    public function update(Request $request, $id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);

        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Observaciones' => 'nullable|string|max:200',
            'tblcentroformacion_NIS' => 'required|integer',
            'tblprogramasdeformacion_NIS' => 'required|integer',
            'FichascaracterizacionEPS' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('FichascaracterizacionEPS')) {

            if ($ficha->FichascaracterizacionEPS) {
                Storage::disk('public')->delete('pdfs/' . $ficha->FichascaracterizacionEPS);
            }

            $nombreArchivo = 'ficha_' . time() . '.' . $request->file('FichascaracterizacionEPS')->extension();
            $request->file('FichascaracterizacionEPS')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['FichascaracterizacionEPS'] = $nombreArchivo;
        }

        $ficha->update($data);

        return redirect()->route('fichascaracterizacion.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);

        if ($ficha->FichascaracterizacionEPS) {
            Storage::disk('public')->delete('pdfs/' . $ficha->FichascaracterizacionEPS);
        }

        $ficha->delete();

        return redirect()->route('fichascaracterizacion.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
