<?php

namespace App\Http\Controllers;

use App\Models\subalternativasep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class subalternativasepController extends Controller
{
    public function index()
    {
        $subalternativasep = subalternativasep::all();
        return view('subalternativasep.index', compact('subalternativasep'));
    }

    public function create()
    {
        return view('subalternativasep.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'Subalternativasep' => 'required|mimes:pdf|max:2048'
        ]);

        //$data['Nombre']= Crypt::encrypt($data['Nombre']);
        //ENCRIPTACIÓN DE LA VARIABLE NOMBRE DE LA TABLA subalternativasep

        if ($request->hasFile('Subalternativasep')) {

            $nombreArchivo = 'sub_' . time() . '.' . $request->file('Subalternativasep')->extension();

            $request->file('Subalternativasep')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['Subalternativasep'] = $nombreArchivo;
        }

        subalternativasep::create($data);

        return redirect()->route('subalternativasep.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function show($id)
    {
        $subalternativasep = subalternativasep::findOrFail($id);
        return view('subalternativasep.show', compact('subalternativasep'));
    }

    public function edit($id)
    {
        $subalternativasep = subalternativasep::findOrFail($id);
        return view('subalternativasep.edit', compact('subalternativasep'));
    }

    public function update(Request $request, $id)
    {
        $subalternativasep = subalternativasep::findOrFail($id);

        $data = $request->validate([
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'Subalternativasep' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('Subalternativasep')) {

            if ($subalternativasep->Subalternativasep) {
                Storage::disk('public')->delete('pdfs/' . $subalternativasep->Subalternativasep);
            }

            $nombreArchivo = 'sub_' . time() . '.' . $request->file('Subalternativasep')->extension();

            $request->file('Subalternativasep')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['Subalternativasep'] = $nombreArchivo;
        }

        $subalternativasep->update($data);

        return redirect()->route('subalternativasep.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $subalternativasep = subalternativasep::findOrFail($id);

        if ($subalternativasep->Subalternativasep) {
            Storage::disk('public')->delete('pdfs/' . $subalternativasep->Subalternativasep);
        }

        $subalternativasep->delete();

        return redirect()->route('subalternativasep.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
