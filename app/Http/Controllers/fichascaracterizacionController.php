<?php

namespace App\Http\Controllers;

use App\Models\fichascaracterizacion;
use App\Models\centroformacion;
use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fichascaracterizacionController extends Controller
{
    public function index()
    {
        // Usamos los nombres de las funciones que pusiste en tu modelo
        $fichascaracterizacion = fichascaracterizacion::with(['centroformacion', 'programaformacion'])->get();
        return view('fichascaracterizacion.index', compact('fichascaracterizacion'));
    }

    public function create()
    {
        $centros = centroformacion::all();
        $programas = programasdeformacion::all();
        return view('fichascaracterizacion.create', compact('centros', 'programas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Codigo' => 'required|unique:tblfichascaracterizacion,Codigo',
            'Denominacion' => 'required|string|max:200',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date|after_or_equal:FechaInicio', // Cambiado
            'Observaciones' => 'nullable|string',
            'tblcentroformacion_NIS' => 'required',
            'tblprogramasdeformacion_NIS' => 'required',
            'FichascaracterizacionPDF' => 'nullable|mimes:pdf|max:5120' // Cambiado a nullable y más peso
        ]);

        if ($request->hasFile('FichascaracterizacionPDF')) {
            $nombreArchivo = 'ficha_' . time() . '.' . $request->file('FichascaracterizacionPDF')->extension();
            $request->file('FichascaracterizacionPDF')->storeAs('pdfs_fichas', $nombreArchivo, 'public');
            $data['FichascaracterizacionPDF'] = $nombreArchivo;
        }

        fichascaracterizacion::create($data);

        return redirect()->route('fichascaracterizacion.index')->with('success', 'Ficha creada con éxito');
    }

    public function update(Request $request, $id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);

        $data = $request->validate([
            'Codigo' => 'required|unique:tblfichascaracterizacion,Codigo,' . $id . ',NIS',
            'Denominacion' => 'required|string|max:200',
            'Cupo' => 'required|integer',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date|after:FechaInicio',
            'Observaciones' => 'nullable|string',
            'tblcentroformacion_NIS' => 'required|exists:tblcentroformacion,NIS',
            'tblprogramasdeformacion_NIS' => 'required|exists:tblprogramasdeformacion,NIS',
            'FichascaracterizacionPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('FichascaracterizacionPDF')) {
            // Borramos el PDF viejo si existe para no llenar el servidor
            if ($ficha->FichascaracterizacionPDF) {
                Storage::disk('public')->delete('pdfs_fichas/' . $ficha->FichascaracterizacionPDF);
            }

            $nombreArchivo = 'ficha_' . time() . '.' . $request->file('FichascaracterizacionPDF')->extension();
            $request->file('FichascaracterizacionPDF')->storeAs('pdfs_fichas', $nombreArchivo, 'public');
            $data['FichascaracterizacionPDF'] = $nombreArchivo;
        }

        $ficha->update($data);

        return redirect()->route('fichascaracterizacion.index')->with('success', 'Ficha actualizada');
    }

    public function destroy($id)
    {
        $ficha = fichascaracterizacion::findOrFail($id);

        // Borramos el archivo físico antes de borrar el registro
        if ($ficha->FichascaracterizacionPDF) {
            Storage::disk('public')->delete('pdfs_fichas/' . $ficha->FichascaracterizacionPDF);
        }

        $ficha->delete();
        return redirect()->route('fichascaracterizacion.index')->with('success', 'Ficha eliminada');
    }
    public function show($id)
    {
        // Buscamos la ficha por su NIS cargando sus relaciones
        $ficha = fichascaracterizacion::with(['centroformacion', 'programaformacion'])->findOrFail($id);

        // Retornamos la vista (asegúrate de que la carpeta se llame fichascaracterizacion)
        return view('fichascaracterizacion.show', compact('ficha'));
    }
}
