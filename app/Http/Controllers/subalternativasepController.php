<?php

namespace App\Http\Controllers;


use App\Models\subalternativasep;
use Illuminate\Http\Request;

class subalternativasepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subalternativasep = subalternativasep::all();

        return view('subalternativasep.index', compact('subalternativasep'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subalternativasep.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'Nombre' => 'required|string|max:100',
            'Descripcion' => 'required|string|max:200'
        ]);

        subalternativasep::create($data);

        return redirect()->route('subalternativasep.index')
            ->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
