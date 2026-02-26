<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'required|string|max:200'
        ]);

        programasdeformacion::create($data);

        return redirect()->route('programasdeformacion.index')
            ->with('success', 'Registro guardado correctamente');
    }
}
