<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Sistema;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TiposController extends Controller
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
                'Tdescriocion_tipo' => 'required|unique:tipos',
            ], 
            [], 
            [
                'Tdescriocion_tipo' => 'Tipo', 
            ]);

        
        if (strlen($request->Tdescriocion_tipo) >40) {
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '!Upss No Ingreso correctamente!',
                'text' => 'El Tipo de bien no puede ser mayor a 40 carecteres'
            ]);
            return redirect('/admin/exportar');
        } else {
            if ($validator->fails()) {
                if ($validator->errors()->has('Tdescriocion_tipo')) {
                    $error = $validator->errors()->first('Tdescriocion_tipo');
                    session()->flash('swal',[
                        'icon' => 'error',
                        'title' => '!Upss No Ingreso correctamente!',
                        'text' => 'El Tipo de bien ya existe'
                    ]);
                    return redirect('/admin/exportar');
                }
            }else{
                Tipo::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Exito¡',
                    'text'=>'El Tipo de bien fue registrado con Exito'
                    
                ]);
               
                return redirect('/admin/exportar');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        //
    }
}
