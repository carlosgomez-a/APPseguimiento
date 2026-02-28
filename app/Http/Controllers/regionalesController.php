<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class regionalesController extends Controller
{
    public function index()
    {
        $regionales = regionales::all();
        return view('regionales.index', compact('regionales'));
    }

    public function create()
    {
        return view('regionales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'required|string|max:200',
            'RegionalesPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        //$data['Denominacion']= Crypt::encrypt($data['Denominacion']);
        //ENCRIPTACIÓN DE LA VARIABLE Denominacion DE LA TABLA Regionales
        if ($request->hasFile('RegionalesPDF')) {

            $nombreArchivo = 'reg_' . time() . '.' . $request->file('RegionalesPDF')->extension();

            $request->file('RegionalesPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['RegionalesPDF'] = $nombreArchivo;
        }

        regionales::create($data);

        return redirect()->route('regionales.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function show($id)
    {
        $regional = regionales::findOrFail($id);
        return view('regionales.show', compact('regional'));
    }

    public function edit($id)
    {
        $regional = regionales::findOrFail($id);
        return view('regionales.edit', compact('regional'));
    }

    public function update(Request $request, $id)
    {
        $regional = regionales::findOrFail($id);

        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'required|string|max:200',
            'RegionalesPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('RegionalesPDF')) {

            if ($regional->RegionalesPDF) {
                Storage::disk('public')->delete('pdfs/' . $regional->RegionalesPDF);
            }

            $nombreArchivo = 'reg_' . time() . '.' . $request->file('RegionalesPDF')->extension();

            $request->file('RegionalesPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['RegionalesPDF'] = $nombreArchivo;
        }

        $regional->update($data);

        return redirect()->route('regionales.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $regional = regionales::findOrFail($id);

        if ($regional->RegionalesPDF) {
            Storage::disk('public')->delete('pdfs/' . $regional->RegionalesPDF);
        }

        $regional->delete();

        return redirect()->route('regionales.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
