<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Category;
use App\Models\Tipo;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //muestra el formulario
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin.ingresar', compact('areas','tipos') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion
        $request->validate([
            'area_id' => 'required',
            'tipo_id' => 'required',
            'codigo_patrimonial' => 'required|min:12|max:12',
            'descripcion' => 'required',
            //laravel crea una variable una variable errors, q se pondra en su php
        ]);

        //este metodo es post es el que rellena el formulario x debajo
        $bien = new Bien();
        //esto se podria evitar con carga masivoa . pero se vera despues
        $bien->area_id=$request->area;
        $bien->tipo_id=$request->tipo;
        $bien->descripcion=$request->descripcion;
        $bien->codigo_patrimonial=$request->descripcion;
        $bien->estado=1;

        $bien->save();
        
       return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bien $bien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bien $bien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        //
    }
}
