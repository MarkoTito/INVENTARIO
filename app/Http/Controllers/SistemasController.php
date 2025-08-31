<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Sistema;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SistemasController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), 
            [
                'Tdescripcion_sistema' => 'required|unique:sistemas',
            ], 
            [], 
            [
                'Tdescripcion_sistema' => 'Sistema', 
            ]);

        
        if (strlen($request->Tdescripcion_sistema) >40) {
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '!Upss No Ingreso correctamente!',
                'text' => 'El Sistema no puede ser mayor a 40 carecteres'
            ]);
            return redirect('/admin/Agregar');
        } else {
            if ($validator->fails()) {
                if ($validator->errors()->has('Tdescripcion_sistema')) {
                    $error = $validator->errors()->first('Tdescripcion_sistema');
                    session()->flash('swal',[
                        'icon' => 'error',
                        'title' => '!Upss No Ingreso correctamente!',
                        'text' => 'El Sistema ya existe'
                    ]);
                    return redirect('/admin/Agregar');
                }
            }else{
                Sistema::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Exito¡',
                    'text'=>'El Sistema fue registrado con Exito'
                    
                ]);
               
                return redirect('/admin/Agregar');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sistema $sistema)
    {
        //
        $sistema->Testado_sistema=1;
        $sistema->save();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Exito¡',
            'text'=>'El Sistema fue habilitado con Exito'
                    
       ]);
        return redirect('/admin/Agregar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        //
        $sistema->Testado_sistema=0;
        $sistema->save();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Exito¡',
            'text'=>'El Sistema fue deshabilitado con Exito'
                    
       ]);
        return redirect('/admin/Agregar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sistema $sistema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        //
    }
}
