<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\fichascaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class aprendicesController extends Controller
{

    public function index()
    {
        $aprendices = aprendices::with(['tipoDocumento', 'eps', 'ficha'])->get();
        return view('aprendices.index', compact('aprendices'));
    }

    public function create()
    {
        return view('aprendices.create', [
            'tiposdocumentos' => tiposdocumentos::all(),
            'eps'             => eps::all(),
            'fichas'          => fichascaracterizacion::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'NumeroDoc'                   => 'required',
            'Nombres'                     => 'required|string|max:100',
            'Apellidos'                   => 'required|string|max:100',
            'Direccion'                   => 'required|string|max:200',
            'Telefono'                    => 'required',
            'CorreoInstitucional'         => 'required|email',
            'CorreoPersonal'              => 'required|email',
            'Sexo'                        => 'required',
            'FechaNacimiento'             => 'required|date',
            'tbltiposdocumentos_NIS'      => 'required|exists:tbltiposdocumentos,NIS',
            'tbleps_NIS'                  => 'required|exists:tbleps,NIS',
            'tblfichascaracterizacion_NIS'=> 'required|exists:tblfichascaracterizacion,NIS',
            'AprendicesPDF'               => 'required|file|mimes:pdf|max:2048',
        ]);

        $data['AprendicesPDF'] = $this->guardarPDF($request);

        aprendices::create($data);

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz guardado correctamente.');
    }

    public function show($id)
    {
        $aprendiz = aprendices::with(['tipoDocumento', 'eps', 'ficha'])->findOrFail($id);
        return view('aprendices.show', compact('aprendiz'));
    }

    public function edit($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        $this->validarAccesoAprendiz($aprendiz);

        return view('aprendices.edit', [
            'aprendiz'         => $aprendiz,
            'tiposdocumentos'  => tiposdocumentos::all(),
            'eps'              => eps::all(),
            'fichas'           => fichascaracterizacion::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $aprendiz = aprendices::findOrFail($id);

        $this->validarAccesoAprendiz($aprendiz);

        $data = $request->validate([
            'NumeroDoc'                   => 'required',
            'Nombres'                     => 'required|string|max:100',
            'Apellidos'                   => 'required|string|max:100',
            'Direccion'                   => 'required|string|max:200',
            'Telefono'                    => 'required',
            'CorreoInstitucional'         => 'required|email',
            'CorreoPersonal'              => 'required|email',
            'Sexo'                        => 'required',
            'FechaNacimiento'             => 'required|date',
            'tbltiposdocumentos_NIS'      => 'required|exists:tbltiposdocumentos,NIS',
            'tbleps_NIS'                  => 'required|exists:tbleps,NIS',
            'tblfichascaracterizacion_NIS'=> 'required|exists:tblfichascaracterizacion,NIS',
            'AprendicesPDF'               => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // 📄 Manejo de PDF
        if ($request->hasFile('AprendicesPDF')) {
            if ($aprendiz->AprendicesPDF) {
                Storage::disk('public')->delete('pdfs/' . $aprendiz->AprendicesPDF);
            }

            $data['AprendicesPDF'] = $this->guardarPDF($request);
        }

        $aprendiz->update($data);

        // 🔁 Redirección por rol
        if (Auth::user()->role_id == 5) {
            return redirect()->route('aprendiz.mis-datos.edit', $aprendiz->NIS)
                ->with('success', 'Tus datos fueron actualizados correctamente.');
        }

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        if ($aprendiz->AprendicesPDF) {
            Storage::disk('public')->delete('pdfs/' . $aprendiz->AprendicesPDF);
        }

        $aprendiz->delete();

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente.');
    }

    // 🔐 MÉTODO CENTRALIZADO DE SEGURIDAD
    private function validarAccesoAprendiz($aprendiz)
    {
        if (Auth::user()->role_id == 5) {
            if (trim(Auth::user()->NumeroDoc) !== trim($aprendiz->NumeroDoc)) {
                abort(403, 'No puedes editar datos de otros aprendices.');
            }
        }
    }

    // 📄 MÉTODO PARA GUARDAR PDF
    private function guardarPDF(Request $request): string
    {
        $nombreArchivo = 'apr_' . time() . '.' . $request->file('AprendicesPDF')->extension();
        $request->file('AprendicesPDF')->storeAs('pdfs', $nombreArchivo, 'public');
        return $nombreArchivo;
    }
}
