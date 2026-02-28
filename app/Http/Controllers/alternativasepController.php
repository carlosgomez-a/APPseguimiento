<?php

namespace App\Http\Controllers;

use App\Models\alternativasep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class alternativasepController extends Controller
{
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
        $data = $request->validate([
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'AlternativasepPDF' => 'required|mimes:pdf|max:2048'
        ]);

        //$data['Nombre']= Crypt::encrypt($data['Nombre']);
        //ENCRIPTACIÓN DE LA VARIABLE NOMBRE DE LA TABLA ALTERNATIVASEP

        if ($request->hasFile('AlternativasepPDF')) {

            $nombreArchivo = 'cam_' . time() . '.' . $request->file('AlternativasepPDF')->extension();

            $request->file('AlternativasepPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['AlternativasepPDF'] = $nombreArchivo;
        }

        alternativasep::create($data);

        return redirect()->route('alternativasep.index')
            ->with('success', 'Registro guardado correctamente');
    }

    public function show($id)
    {
        $alternativasep = alternativasep::findOrFail($id);
        return view('alternativasep.show', compact('alternativasep'));
    }

    public function edit($id)
    {
        $alternativasep = alternativasep::findOrFail($id);
        return view('alternativasep.edit', compact('alternativasep'));
    }

    public function update(Request $request, $id)
    {
        $alternativasep = alternativasep::findOrFail($id);

        $data = $request->validate([
            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200',
            'AlternativasepPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('AlternativasepPDF')) {

            if ($alternativasep->AlternativasepPDF) {
                Storage::disk('public')->delete('pdfs/' . $alternativasep->AlternativasepPDF);
            }

            $nombreArchivo = 'cam_' . time() . '.' . $request->file('AlternativasepPDF')->extension();

            $request->file('AlternativasepPDF')->storeAs('pdfs', $nombreArchivo, 'public');

            $data['AlternativasepPDF'] = $nombreArchivo;
        }

        $alternativasep->update($data);

        return redirect()->route('alternativasep.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $alternativasep = alternativasep::findOrFail($id);

        if ($alternativasep->AlternativasepPDF) {
            Storage::disk('public')->delete('pdfs/' . $alternativasep->AlternativasepPDF);
        }

        $alternativasep->delete();

        return redirect()->route('alternativasep.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
