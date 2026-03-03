<?php

namespace App\Http\Controllers;

use App\Models\enteconformador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class enteconformadorController extends Controller
{
    public function index()
    {
        $entes = enteconformador::all();
        return view('enteconformador.index', compact('entes'));
    }

    public function create()
    {
        return view('enteconformador.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TipoDoc' => 'required',
            'NumeroDoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email',
            'EnteconformadorPDF' => 'required|mimes:pdf|max:2048',
        ]);

        //$data['RazonSocial']= Crypt::encrypt($data['RazonSocial']);
        //ENCRIPTACIÓN DE LA VARIABLE RazonSocial DE LA TABLA Enteconformador


        $nombrePDF = null;

        if ($request->hasFile('EnteconformadorPDF')) {
            $nombrePDF = time().'_'.$request->file('EnteconformadorPDF')->getClientOriginalName();
            $request->file('EnteconformadorPDF')->storeAs('public/pdfs', $nombrePDF);
        }

        enteconformador::create([
            'TipoDoc' => $request->TipoDoc,
            'NumeroDoc' => $request->NumeroDoc,
            'RazonSocial' => $request->RazonSocial,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'CorreoInstitucional' => $request->CorreoInstitucional,
            'EnteconformadorPDF' => $nombrePDF,
        ]);

        return redirect()->route('enteconformador.index')
            ->with('success', 'Ente conformador creado correctamente');
    }

    public function show($id)
    {
        $ente = enteconformador::findOrFail($id);
        return view('enteconformador.show', compact('ente'));
    }

    public function edit($id)
    {
        $ente = enteconformador::findOrFail($id);
        return view('enteconformador.edit', compact('ente'));
    }

    public function update(Request $request, $id)
    {
        $ente = enteconformador::findOrFail($id);

        $request->validate([
            'TipoDoc' => 'required',
            'NumeroDoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email',
            'EnteconformadorPDF' => 'nullable|mimes:pdf|max:2048',
        ]);

        $nombrePDF = $ente->EnteconformadorPDF;

        if ($request->hasFile('EnteconformadorPDF')) {

            if ($ente->EnteconformadorPDF) {
                Storage::delete('public/pdfs/'.$ente->EnteconformadorPDF);
            }

            $nombrePDF = time().'_'.$request->file('EnteconformadorPDF')->getClientOriginalName();
            $request->file('EnteconformadorPDF')->storeAs('public/pdfs', $nombrePDF);
        }

        $ente->update([
            'TipoDoc' => $request->TipoDoc,
            'NumeroDoc' => $request->NumeroDoc,
            'RazonSocial' => $request->RazonSocial,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'CorreoInstitucional' => $request->CorreoInstitucional,
            'EnteconformadorPDF' => $nombrePDF,
        ]);

        return redirect()->route('enteconformador.index')
            ->with('success', 'Ente conformador actualizado correctamente');
    }

    public function destroy($id)
    {
        $ente = enteconformador::findOrFail($id);

        if ($ente->EnteconformadorPDF) {
            Storage::delete('public/pdfs/'.$ente->EnteconformadorPDF);
        }

        $ente->delete();

        return redirect()->route('enteconformador.index')
            ->with('success', 'Ente conformador eliminado correctamente');
    }
}
