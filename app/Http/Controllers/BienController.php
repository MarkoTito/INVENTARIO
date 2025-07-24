<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Category;
use App\Models\Tipo;
use GuzzleHttp\Promise\Create;
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
        // //validacion
        // $request->validate([
        //     'FK_B_Fisico_TipoId' => 'required',
        //     'FK_B_Fisico_Area' => 'required',
        //     'UK_Codigo_Pratimonial' => 'required|min:12|max:12|unique:b_fisicos',
        //     'T_B_Descripcion' => 'required',
        //     'T_Estado'=> 'required'
        //     //laravel crea una variable una variable errors, q se pondra en su php (1 forma)
        // ]);
        
        // //NUEVA FORMA (CARGA  MASIVA)
        // //Bien::create($request->all());
        
        
        
        //ANTIGUA FORMA
        //este metodo es post es el que rellena el formulario x debajo
        $bien = new Bien();
        //esto se podria evitar con carga masivoa . pero se vera despues
        $bien->FK_B_Fisico_Area=$request->FK_B_Fisico_Area;
        $bien->FK_B_Fisico_TipoId=$request->FK_B_Fisico_TipoId;
        $bien->T_B_Descripcion=$request->T_B_Descripcion;
        $bien->UK_Codigo_Pratimonial=$request->UK_Codigo_Pratimonial;
        $bien->T_Estado=$request->T_Estado;
        $bien->N_Estado=1;
        $bien->D_Adquisicion=null;
        $bien->save();
        
        //return 'se registro correctamente';
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
