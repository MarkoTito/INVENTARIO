<?php

namespace App\Http\Controllers;

use App\Models\Bajas;
use App\Models\Bien;
use App\Models\Modificacion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt; //seguridad osea cifrado




class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function index_bajar($code)
    {   
         //formulario de baja
        // Gate::authorize('create-comentario'); 
        
        return view('admin.bajar', compact('code') );

    }
    public function baja (Request $request,$bien)
    {
        // Gate::authorize('bajar-hardware'); 
        if (!$request->T_Motivo_Baja || strlen($request->T_Motivo_Baja) > 180) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '!Upss',
                'text' => 'No introdujo un motivo o es muy largo'
            ]);
            return redirect()->route('adminbien.index');
        }
        
        $usuario=Auth::user()->id;
        
        $fecha=Carbon::now();
        ////Bajar bien
        
        $dato= Bien::where('UK_Hardware_Codigo',$bien)->update(
            [
                'FK_Hardware_EstadoId' => 2                
            ]
        );
        $bienBja= Bien::where('UK_Hardware_Codigo',$bien)->first();

        Bajas::create([
            "FK_Bajas_HardwareId" => $bienBja->PK_Hardware,
            "FK_Baja_UserId" => $usuario,
            "Tdescripcion_baja" => $request->T_Motivo_Baja,

            "Tusuario_baja" => $request->usuario,
            "Tcargo_baja" => $request->cargo,
            "Tcontrato_baja" => $request->contratro,
        ]);
        Modificacion::create([
                'FK_Modificaciones_UserId' => $usuario,
                'FK_Modificaciones_HardwareId' => $bienBja->PK_Hardware,
                'Tdescripcion_modificaciones'=> "3"
            ]);
       
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Bien hecho',
            'text'=>   'El bien fue dado de baja correctamente'
        ]);
        
        //return $bien;
        return redirect()->route('adminbien.index');
    }
    public function reversion($code)
    {   
        //formulario de revercion de baja
        // Gate::authorize('create-comentario'); 

        $baja = Bajas::where('FK_Bajas_HardwareId', $code)
             ->with('usuarioBaja')
             ->latest() 
             ->first();
        
        return view('admin.reactivar', compact('code','baja') );

    }
    public function revertirbaja (Request $request,$bien)
    {        
        // Gate::authorize('bajar-hardware'); 
        if (!$request->T_Motivo_Activar || strlen($request->T_Motivo_Activar) > 125) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '!Upss',
                'text' => 'No introdujo un motivo o es muy largo'
            ]);
            return redirect()->route('adminbien.index');
        }
        
        ////revetir  baja
        $usuario=Auth::user()->id;
        
        $dato= Bien::where('PK_Hardware',$bien)->update(
            [
                'FK_Hardware_EstadoId' => 1                
            ]
        );


        if ($request->tipo == 1) {
            # por el modal
            $lastBaja= Bajas::where('FK_Bajas_HardwareId',$bien)
                            ->where('Testado_baja',1)
                            ->first();
            
            $PK_baja=$lastBaja->PK_Bajas;

            Bajas::where('PK_Bajas',$PK_baja)->update(
                [
                    'FK_null_Baja_UserId' => $usuario,
                    'Tdescripcion_null_baja' => $request->T_Motivo_Activar,
                    'Testado_baja' => 0
    
                ]
            );
                       
            Modificacion::create([
                    'FK_Modificaciones_UserId' => $usuario,
                    'FK_Modificaciones_HardwareId' => $bien,
                    'Tdescripcion_modificaciones'=> "4"
                ]);
           
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>   'El bien se re activo correctamente'
            ]);
            return redirect()->route('adminbien.index');


        } else {
            # por el buscar
            Bajas::where('PK_Bajas',$request->PK_baja)->update(
                [
                    'FK_null_Baja_UserId' => $usuario,
                    'Tdescripcion_null_baja' => $request->T_Motivo_Activar,
                    'Testado_baja' => 0
    
                ]
            );
            
            //guardado en el BD de modificaciones
           
            Modificacion::create([
                    'FK_Modificaciones_UserId' => $usuario,
                    'FK_Modificaciones_HardwareId' => $bien,
                    'Tdescripcion_modificaciones'=> "4"
                ]);
           
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>   'El bien se re activo correctamente'
            ]);
            return redirect()->route('adminbien.index');
        }
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Bajas $bajas)
    {
        // aca muestro el historial de las bajas
        return "holas";
    }
    public function historialBajas($idCifrado)
    {   
        // Gate::authorize('read-hardware');
        $id = Crypt::decryptString($idCifrado);

        $bajas=Bajas::with('usuarioBaja','usuarioNullBaja')
                ->where('FK_Bajas_HardwareId',$id)
                ->where('Testado_baja',0)
                 ->get();
        
        //return $bajas;
        return view('admin.Historial_baja',compact('bajas'));                                                        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bajas $bajas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bajas $bajas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bajas $bajas)
    {
        //
    }
}
