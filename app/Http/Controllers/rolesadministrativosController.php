<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;

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
        $request->validate([
            'Descripcion' => 'required|string|max:200',
        ]);

        rolesadministrativos::create($request->all());

        return redirect()->route('rolesadministrativos.index')
            ->with('success', 'Rol creado correctamente');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
    }
}
