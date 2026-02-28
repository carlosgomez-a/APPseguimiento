<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class tiposdocumentosController extends Controller
{
    public function index()
    {
        $tiposdocumentos = tiposdocumentos::all();
        return view('tiposdocumentos.index', compact('tiposdocumentos'));
    }

    public function create()
    {
        return view('tiposdocumentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'required|string|max:200',
            'TiposdocumentosPDF' => 'required|mimes:pdf|max:2048'
        ]);

        //$data['Observaciones']= Crypt::encrypt($data['Observaciones']);
        //ENCRIPTACIÓN DE LA VARIABLE Observaciones DE LA TABLA Tiposdocumentos

        if ($request->hasFile('TiposdocumentosPDF')) {

            $nombreArchivo = 'tipdoc_' . time() . '.' . $request->file('TiposdocumentosPDF')->extension();

            $request->file('TiposdocumentosPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['TiposdocumentosPDF'] = $nombreArchivo;
        }

        tiposdocumentos::create($data);

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipo de documento creado correctamente');
    }

    public function show($id)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($id);
        return view('tiposdocumentos.show', compact('tiposdocumentos'));
    }

    public function edit($id)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($id);
        return view('tiposdocumentos.edit', compact('tiposdocumentos'));
    }

    public function update(Request $request, $id)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($id);

        $data = $request->validate([
            'Denominacion' => 'required|string|max:100',
            'Observaciones' => 'required|string|max:200',
            'TiposdocumentosPDF' => 'nullable|mimes:pdf|max:200'
        ]);

        if ($request->hasFile('TiposdocumentosPDF')) {

            if ($tiposdocumentos->TiposdocumentosPDF) {
                Storage::disk('public')->delete('pdfs/' . $tiposdocumentos->TiposdocumentosPDF);
            }

            $nombreArchivo = 'tipdoc_' . time() . '.' . $request->file('TiposdocumentosPDF')->extension();

            $request->file('TiposdocumentosPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['TiposdocumentosPDF'] = $nombreArchivo;
        }

        $tiposdocumentos->update($data);

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipo de documento actualizado correctamente');
    }

    public function destroy($id)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($id);

        if ($tiposdocumentos->TiposdocumentosPDF) {
            Storage::disk('public')->delete('pdfs/' . $tiposdocumentos->TiposdocumentosPDF);
        }

        $tiposdocumentos->delete();

        return redirect()->route('tiposdocumentos.index')
            ->with('success', 'Tipo de documento eliminado correctamente');
    }
}
