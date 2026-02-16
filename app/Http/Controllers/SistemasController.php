<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Marca;
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
                'UK_Nombre_marca' => 'required|unique:marcas',
            ], 
            [], 
            [
                'UK_Nombre_marca' => 'Marca', 
            ]);

        
        if (strlen($request->UK_Nombre_marca) >40) {
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '!Upss No Ingreso correctamente!',
                'text' => 'El marca no puede ser mayor a 40 carecteres'
            ]);
            return redirect('/admin/Agregar');
        } else {
            if ($validator->fails()) {
                if ($validator->errors()->has('UK_Nombre_marca')) {
                    $error = $validator->errors()->first('UK_Nombre_marca');
                    session()->flash('swal',[
                        'icon' => 'error',
                        'title' => '!Upss No Ingreso correctamente!',
                        'text' => 'La marca ya existe'
                    ]);
                    return redirect('/admin/Agregar');
                }
            }else{
                Marca::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Exito¡',
                    'text'=>'La marca fue registrado con Exito'
                    
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
