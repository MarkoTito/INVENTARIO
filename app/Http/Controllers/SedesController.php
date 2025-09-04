<?php

namespace App\Http\Controllers;

use App\Models\Sedes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SedesController extends Controller
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
        //
        $validator = Validator::make($request->all(), 
            [
                'UK_Nombre_sede' => 'required|unique:sedes',
            ], 
            [], 
            [
                'UK_Nombre_sede' => 'Sede', 
            ]
        );
        if (strlen($request->UK_Nombre_area) >105) {
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '!Upss No Ingreso correctamente!',
                'text' => 'El area no puede ser mayor a 90 carecteres'
            ]);
           return redirect('/admin/Agregar');
        } else {

            if ($validator->fails()) {
                if ($validator->errors()->has('UK_Nombre_sede')) {
                    $error = $validator->errors()->first('UK_Nombre_sede');
                    session()->flash('swal',[
                        'icon' => 'error',
                        'title' => '!Upss No Ingreso correctamente!',
                        'text' => 'El area ya existe'
                    ]);
                   return redirect('/admin/Agregar');
                }
            }else{
                Sedes::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Exito¡',
                    'text'=>'La sede fue registrado con Exito'
                    
                ]);
               
               return redirect('/admin/Agregar');
            }
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Sedes $sedes)
    {

        //lo usare para habilitarlo
        $sedes->Nestado_sede=1;
        $sedes->save();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Exito¡',
            'text'=>'La sede fue habilitada'
                    
        ]);
        return redirect('/admin/Agregar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sedes $sedes)
    {
        
    }

    public function disable(Sedes $sede)
    {
        $sede->Nestado_sede = 0;
        $sede->save();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Éxito!',
            'text'  => 'La sede fue deshabilitada'
        ]);

        return redirect('/admin/Agregar');
    }
    public function habilitar(Sedes $sede)
    {
        $sede->Nestado_sede = 1;
        $sede->save();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Éxito!',
            'text'  => 'La sede fue Habilitada'
        ]);

        return redirect('/admin/Agregar');
    }




    public function baja_sede($sedes)
    {
        //baja de sede
        return $sedes;
        /*
        $sedes->Nestado_sede=0;
        $sedes->save();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Exito¡',
            'text'=>'La sede fue deshabilitado'
                    
        ]);
        return redirect('/admin/Agregar');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sedes $sedes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sedes $sedes)
    {
        //
    }
}
