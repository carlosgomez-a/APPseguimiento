<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class programasdeformacionController extends Controller
{
    public function index()
    {
        $programas = programasdeformacion::all();
        return view('programasdeformacion.index', compact('programas'));
    }

    public function create()
    {
        return view('programasdeformacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Observaciones' => 'required',
            'ProgramasdeformacionPDF' => 'required|mimes:pdf|max:2048',
        ]);

        //$data['Denominacion']= Crypt::encrypt($data['Denominacion']);
        //ENCRIPTACIÓN DE LA VARIABLE Denominacion DE LA TABLA programasdeformacion

        $nombrePDF = null;

        if ($request->hasFile('ProgramasdeformacionPDF')) {
            $nombrePDF = time().'_'.$request->file('ProgramasdeformacionPDF')->getClientOriginalName();
            $request->file('ProgramasdeformacionPDF')->storeAs('public/pdfs', $nombrePDF);
        }

        programasdeformacion::create([
            'Codigo' => $request->Codigo,
            'Denominacion' => $request->Denominacion,
            'Observaciones' => $request->Observaciones,
            'ProgramasdeformacionPDF' => $nombrePDF,
        ]);

        return redirect()->route('programasdeformacion.index')
            ->with('success', 'Programa creado correctamente');
    }

    public function show($id)
    {
        $programa = programasdeformacion::findOrFail($id);
        return view('programasdeformacion.show', compact('programa'));
    }

    public function edit($id)
    {
        $programa = programasdeformacion::findOrFail($id);
        return view('programasdeformacion.edit', compact('programa'));
    }

    public function update(Request $request, $id)
    {
        $programa = programasdeformacion::findOrFail($id);

        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Observaciones' => 'required',
            'ProgramasdeformacionPDF' => 'nullable|mimes:pdf|max:2048',
        ]);

        $nombrePDF = $programa->ProgramasdeformacionPDF;

        if ($request->hasFile('ProgramasdeformacionPDF')) {

            if ($programa->ProgramasdeformacionPDF) {
                Storage::delete('public/pdfs/'.$programa->ProgramasdeformacionPDF);
            }

            $nombrePDF = time().'_'.$request->file('ProgramasdeformacionPDF')->getClientOriginalName();
            $request->file('ProgramasdeformacionPDF')->storeAs('public/pdfs', $nombrePDF);
        }

        $programa->update([
            'Codigo' => $request->Codigo,
            'Denominacion' => $request->Denominacion,
            'Observaciones' => $request->Observaciones,
            'ProgramasdeformacionPDF' => $nombrePDF,
        ]);

        return redirect()->route('programasdeformacion.index')
            ->with('success', 'Programa actualizado correctamente');
    }

    public function destroy($id)
    {
        $programa = programasdeformacion::findOrFail($id);

        if ($programa->ProgramasdeformacionPDF) {
            Storage::delete('public/pdfs/'.$programa->ProgramasdeformacionPDF);
        }

        $programa->delete();

        return redirect()->route('programasdeformacion.index')
            ->with('success', 'Programa eliminado correctamente');
    }
}
