<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\fichascaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class aprendicesController extends Controller
{
    public function index()
    {
        $aprendices = aprendices::with(['tipoDocumento','eps','ficha'])->get();
        return view('aprendices.index', compact('aprendices'));
    }
    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $fichas = fichascaracterizacion::all();



        return view('aprendices.create', compact(
            'tiposdocumentos',
            'eps',
            'fichas'
        ));

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
            'tblfichascaracterizacion_NIS' => 'required|exists:tblfichascaracterizacion,NIS',

            'AprendicesPDF' => 'required|mimes:pdf|max:2048'
        ]);

        //$data['Nombres']= Crypt::encrypt($data['Nombres']);
        //ENCRIPTACIÓN DE LA VARIABLE Nombres DE LA TABLA Aprendices

        if ($request->hasFile('AprendicesPDF')) {

            $nombreArchivo = 'apr_' . time() . '.' .
                $request->file('AprendicesPDF')->extension();

            $request->file('AprendicesPDF')
                ->storeAs('pdfs', $nombreArchivo, 'public');

            $data['AprendicesPDF'] = $nombreArchivo;
        }

        aprendices::create($data);

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz guardado correctamente');
    }

    public function show($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        return view('aprendices.show', compact('aprendiz'));
    }

    public function edit($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $fichas = fichascaracterizacion::all();

        return view('aprendices.edit', compact(
            'aprendiz',
            'tiposdocumentos',
            'eps',
            'fichas'
        ));
    }

    public function update(Request $request, $id)
    {
        $aprendiz = aprendices::findOrFail($id);

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
            'tblfichascaracterizacion_NIS' => 'required|exists:tblfichascaracterizacion,NIS',
            'AprendicesPDF' => 'nullable|mimes:pdf|max:200'
        ]);

        if ($request->hasFile('AprendicesPDF')) {

            if ($aprendiz->AprendicesPDF) {
                Storage::disk('public')
                    ->delete('pdfs/' . $aprendiz->AprendicesPDF);
            }

            $nombreArchivo = 'apr_' . time() . '.' .
                $request->file('AprendicesPDF')->extension();

            $request->file('AprendicesPDF')
                ->storeAs('pdfs', $nombreArchivo, 'public');

            $data['AprendicesPDF'] = $nombreArchivo;
        }

        $aprendiz->update($data);

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz actualizado correctamente');
    }

    public function destroy($id)
    {
        $aprendiz = aprendices::findOrFail($id);

        if ($aprendiz->AprendicesPDF) {
            Storage::disk('public')
                ->delete('pdfs/' . $aprendiz->AprendicesPDF);
        }

        $aprendiz->delete();

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente');
    }
}
