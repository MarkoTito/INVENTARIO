<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Sistema;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'hola este es el index';
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
        // $areas=Area::paginate(10);
        // $tipos = Tipo::all();
        // $sistemas = Sistema::all();
        // $users= User::all();
        
        $validator = Validator::make($request->all(), 
            [
                'UK_Nombre_area' => 'required|unique:areas',
            ], 
            [], 
            [
                'UK_Nombre_area' => 'Area', 
            ]);

        
        if (strlen($request->UK_Nombre_area) >90) {
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '!Upss No Ingreso correctamente!',
                'text' => 'El area no puede ser mayor a 90 carecteres'
            ]);
           return redirect('/admin/exportar');
        } else {
            
            if ($validator->fails()) {
                if ($validator->errors()->has('UK_Nombre_area')) {
                    $error = $validator->errors()->first('UK_Nombre_area');
                    session()->flash('swal',[
                        'icon' => 'error',
                        'title' => '!Upss No Ingreso correctamente!',
                        'text' => 'El area ya existe'
                    ]);
                   return redirect('/admin/exportar');
                }
            }else{
                Area::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Exito¡',
                    'text'=>'El area fue registrado con Exito'
                    
                ]);
               
               return redirect('/admin/exportar');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        //
    }
}
