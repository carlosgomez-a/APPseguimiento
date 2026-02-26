<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;

class epsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'NumeroDoc' => 'required|string|max:30',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'required|string|max:200'
        ]);

        eps::create($data);

        return redirect()->route('eps.index')
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
