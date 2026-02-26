<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class regionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $regionales = regionales::all();

        return view('regionales.index', compact('regionales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Codigo' => 'required|integer',
            'Denominacion' => 'required|string|max:200',
            'Observaciones' => 'required|string|max:200'
        ]);

        regionales::create($data);

        return redirect()->route('regionales.index')
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
