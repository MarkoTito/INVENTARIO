<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Comentario;
use App\Models\Tipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('create-comentario'); 
        // dejar comentario de repacion
        //muestra el formulario
        //Gate::authorize();
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin.reparar', compact('areas','tipos') );

    }
    public function index2($code)
    {   
        
        Gate::authorize('create-comentario'); 
        // dejar comentario de repacion
        //muestra el formulario
        //Gate::authorize();
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin.reparar', compact('areas','tipos','code') );

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
        Gate::authorize('create-comentario'); 
        //creacion del comentario
        $data=$request->validate(
            [
                'Tdescripcion_comentario' => 'required',
                'FK_Comentario_HardwareId' => 'required|min:12|max:12',
                'Testado_fisico_comentario' => 'required',
                'situacion' => 'required'
                
            ],
            [],
            [
                'Tdescripcion_comentario'=> 'Comentario',
                'FK_Comentario_HardwareId' => 'Codigo Patrimonial',
                'Testado_fisico_comentario' => 'Estado del Bien',
                'situacion' => 'Situacion'
            ]
        );
        //BUSQUEDA DEL USUARIO_id
        $usuario_id=Auth::user()->id;
        $usuario=Auth::user();
        $fecha = Carbon::now()->format('d-m-Y');
                
        //BUSQUEDA DEL BIEN
        $codigo= Bien::with('area','tipo')
                            ->where('UK_Hardware_Codigo',$request->FK_Comentario_HardwareId)
                            ->first();
        /*
        $bien= Bien::where('UK_Hardware_Codigo',$request->FK_Comentario_HardwareId)
                            ->get();
        */
        if (!$codigo) {
            //varaible de seccion
            session()->flash('swal',[
                'icon'=> 'error',
                'title'=> '!Upss',
                'text'=>   'El Bien no existe'
            ]);
            return redirect()->route('adminbien.index');
        } else {
            if ($codigo->FK_Hardware_EstadoId == 1) {
                if ($request->situacion == 1) {
                    $coment = new Comentario();
                    //esto se podria evitar con carga masivoa . pero se vera despues
                    $coment->FK_Comentario_HardwareId=$codigo->PK_Hardware;
                    $coment->Tdescripcion_comentario=$request->Tdescripcion_comentario;
                    $coment->Testado_fisico_comentario=$request->Testado_fisico_comentario;
                    $coment->Tobservacion_comentario=$request->Tobservacion_comentario;
                    $coment->Trecomendacion_comentario=$request->Trecomendacion_comentario;
                    $coment->FK_Comentario_UserId=$usuario_id;
                    $coment->save();
    
                    
                    $pdf =Pdf::loadView('admin.PDF.entregaPdf',[
                        'comentario' =>$request,
                        'bien' => $codigo,
                        'nombre'=> $usuario,
                        'fecha' => $fecha,
                        
                    ]);
            
                    //varaible de seccion
                    session()->flash('swal',[
                        'icon'=> 'success',
                        'title'=> '!Bien hecho',
                        'text'=>   'El comentario fue registrado con exito'
                    ]);
                    return $pdf->download("compra_{$codigo->PK_Hardware}.pdf");
                    
                
                    return redirect()->route('adminbien.index');
                    
                } else {
                     $coment = new Comentario();
                    //esto se podria evitar con carga masivoa . pero se vera despues
                    $coment->FK_Comentario_HardwareId=$codigo->PK_Hardware;
                    $coment->Tdescripcion_comentario=$request->Tdescripcion_comentario;
                    $coment->Testado_fisico_comentario=$request->Testado_fisico_comentario;
                    $coment->Tobservacion_comentario=$request->Tobservacion_comentario;
                    $coment->FK_Comentario_UserId=$usuario_id;
                    $coment->save();
    
                    //varaible de seccion
                    session()->flash('swal',[
                        'icon'=> 'success',
                        'title'=> '!Bien hecho',
                        'text'=>   'El comentario fue registrado con exito'
                    ]);
                
                    return redirect()->route('adminbien.index');
                }
               


            } else {
                session()->flash('swal',[
                'icon'=> 'error',
                'title'=> '!Upss',
                'text'=>   'El Bien fue dado de baja'
             ]);
             return redirect()->route('adminbien.index');
            }
            
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show1($comentario)
    {
        //Mostrara los comentarios
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
