<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class rolesadministrativosController extends Controller
{
    public function index()
    {
        $rolesadministrativos = rolesadministrativos::all();
        return view('rolesadministrativos.index', compact('rolesadministrativos'));
    }

    public function create()
    {
        return view('rolesadministrativos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Descripcion' => 'required|string|max:200',
            'RolesadministrativosPDF' => 'required|mimes:pdf|max:2048'
        ]);

        //$data['Descripcion']= Crypt::encrypt($data['Descripcion']);
        //ENCRIPTACIÓN DE LA VARIABLE Descripcion DE LA TABLA Rolesadministrativos

        if ($request->hasFile('RolesadministrativosPDF')) {
            $nombreArchivo = 'rol_' . time() . '.' . $request->file('RolesadministrativosPDF')->extension();
            $request->file('RolesadministrativosPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['RolesadministrativosPDF'] = $nombreArchivo;
        }

        rolesadministrativos::create($data);

        return redirect()->route('rolesadministrativos.index')
            ->with('success', 'Rol creado correctamente');
    }

    public function show($id)
    {
        $rolesadministrativos = rolesadministrativos::findOrFail($id);
        return view('rolesadministrativos.show', compact('rolesadministrativos'));
    }

    public function edit($id)
    {
        $rolesadministrativos = rolesadministrativos::findOrFail($id);
        return view('rolesadministrativos.edit', compact('rolesadministrativos'));
    }

    public function update(Request $request, $id)
    {
        $rol = rolesadministrativos::findOrFail($id);

        $data = $request->validate([
            'Descripcion' => 'required|string|max:200',
            'RolesadministrativosPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('RolesadministrativosPDF')) {

            if ($rol->RolesadministrativosPDF) {
                Storage::disk('public')->delete('pdfs/' . $rol->RolesadministrativosPDF);
            }

            $nombreArchivo = 'rol_' . time() . '.' . $request->file('RolesadministrativosPDF')->extension();
            $request->file('RolesadministrativosPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['RolesadministrativosPDF'] = $nombreArchivo;
        }

        $rol->update($data);

        return redirect()->route('rolesadministrativos.index')
            ->with('success', 'Rol actualizado correctamente');
    }

    public function destroy($id)
    {
        $rol = rolesadministrativos::findOrFail($id);

        if ($rol->RolesadministrativosPDF) {
            Storage::disk('public')->delete('pdfs/' . $rol->RolesadministrativosPDF);
        }

        $rol->delete();

        return redirect()->route('rolesadministrativos.index')
            ->with('success', 'Rol eliminado correctamente');
    }
}
