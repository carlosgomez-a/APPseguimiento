<?php

namespace App\Http\Controllers;

use App\Models\instructores;
use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class instructoresController extends Controller
{
    public function index()
    {
        // Nota: Asegúrate de que el nombre aquí coincida con el método del modelo
        $instructores = instructores::with(['tiposdocumentos', 'eps', 'rolesadministrativos'])->get();
        return view('instructores.index', compact('instructores'));
    }

    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $roles = rolesadministrativos::all();
        return view('instructores.create', compact('tiposdocumentos', 'eps', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'NumeroDoc' => 'required',
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email',
            'CorreoPersonal' => 'required|email',
            'Sexo' => 'required',
            'FechaNacimiento' => 'required|date',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tblrolesadministrativos_NIS' => 'required|exists:tblrolesadministrativos,NIS',
            'InstructoresPDF' => 'required|mimes:pdf|max:2048'
        ]);

        // Buscamos el texto (CC, TI, etc.) usando el ID que llegó del select
        $tipoDocRelacion = tiposdocumentos::find($request->tbltiposdocumentos_NIS);

        // Asignamos el nombre automáticamente al campo TipoDoc
        $data['TipoDoc'] = $tipoDocRelacion->Denominacion;

        if ($request->hasFile('InstructoresPDF')) {
            $nombreArchivo = 'inst_' . time() . '.' . $request->file('InstructoresPDF')->extension();
            $request->file('InstructoresPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['InstructoresPDF'] = $nombreArchivo;
        }

        instructores::create($data);

        return redirect()->route('instructores.index')->with('success', 'Instructor guardado correctamente');
    }

    public function update(Request $request, $id)
    {
        $instructor = instructores::findOrFail($id);

        $data = $request->validate([

            'NumeroDoc' => 'required',
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Direccion' => 'required|string|max:200',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|email',
            'CorreoPersonal' => 'required|email',
            'Sexo' => 'required',
            'FechaNacimiento' => 'required|date',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,NIS',
            'tbleps_NIS' => 'required|exists:tbleps,NIS',
            'tblrolesadministrativos_NIS' => 'required|exists:tblrolesadministrativos,NIS',
            'InstructoresPDF' => 'nullable|mimes:pdf|max:2048'
        ]);

        $tipoDocRelacion = tiposdocumentos::find($request->tbltiposdocumentos_NIS);
        $data['TipoDoc'] = $tipoDocRelacion->Denominacion;

        if ($request->hasFile('InstructoresPDF')) {
            if ($instructor->InstructoresPDF) {
                Storage::disk('public')->delete('pdfs/' . $instructor->InstructoresPDF);
            }
            $nombreArchivo = 'inst_' . time() . '.' . $request->file('InstructoresPDF')->extension();
            $request->file('InstructoresPDF')->storeAs('pdfs', $nombreArchivo, 'public');
            $data['InstructoresPDF'] = $nombreArchivo;
        }

        $instructor->update($data);

        return redirect()->route('instructores.index')->with('success', 'Instructor actualizado correctamente');
    }
}
