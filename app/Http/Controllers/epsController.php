<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class epsController extends Controller
{
    public function index()
    {
        $eps = eps::all();
        return view('eps.index', compact('eps'));
    }

    public function create()
    {
        return view('eps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'NumeroDoc' => 'required|string|max:50',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'nullable|string|max:200',
            'EpsPDF' => 'required|mimes:pdf|max:2048'
        ]);


        //$data['Denominacion']= Crypt::encrypt($data['Denominacion']);
        //ENCRIPTACIÓN DE LA VARIABLE Denominacion DE LA TABLA eps

        if ($request->hasFile('EpsPDF')) {
            $nombreArchivo = 'eps_' . time() . '.' . $request->file('EpsPDF')->extension();
            $request->file('EpsPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['EpsPDF'] = $nombreArchivo;
        }

        eps::create($data);

        return redirect()->route('eps.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function show($id)
    {
        $eps = eps::findOrFail($id);
        return view('eps.show', compact('eps'));
    }

    public function edit($id)
    {
        $eps = eps::findOrFail($id);
        return view('eps.edit', compact('eps'));
    }

    public function update(Request $request, $id)
    {
        $eps = eps::findOrFail($id);

        $data = $request->validate([
            'NumeroDoc' => 'required|string|max:50',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'nullable|string|max:200',
            'EpsPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('EpsPDF')) {

            if ($eps->EpsPDF) {
                Storage::disk('public')->delete('pdfs/' . $eps->EpsPDF);
            }

            $nombreArchivo = 'eps_' . time() . '.' . $request->file('EpsPDF')->extension();
            $request->file('EpsPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['EpsPDF'] = $nombreArchivo;
        }

        $eps->update($data);

        return redirect()->route('eps.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $eps = eps::findOrFail($id);

        if ($eps->EpsPDF) {
            Storage::disk('public')->delete('pdfs/' . $eps->EpsPDF);
        }

        $eps->delete();

        return redirect()->route('eps.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
