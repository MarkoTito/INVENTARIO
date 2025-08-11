<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use App\Models\Area;
use App\Models\Digital;
use App\Models\file;
use App\Models\Sistema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostramos en la tabla


        $sistemas= Sistema::all();
        $digitales= Digital::paginate(6);
        return view('admin/Buscar/buscar_Digital',compact('digitales','sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //muestra el formulario
        $areas=Area::all();
        $sistemas = Sistema::all();
        return view('admin.ingresa_sofware', compact('areas','sistemas') );
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
                [
                'FK_B_Digital_AreaId' => 'required',
                'FK_B_Digital_SistemaId' => 'required',
                'T_Nombre_Digital' => 'required',
                'T_Host' => 'required',
                'D_F_Inicio'=> 'required',
                ],
                [],
                [
                    'FK_B_Digital_AreaId'=>'Area',
                    'FK_B_Digital_SistemaId'=> 'Sistema',
                    'T_Nombre_Digital'=>'Nombre del sistema',
                    'T_Host' => 'Host',
                    'D_F_Inicio'=> 'Fecha de Incio'
                ]
        );

        Digital::create($request->all());


        session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>'El bien fue registrado correctamente'
        ]);
        return view('admin/Load_Archivos'); 
        
    }



    public function dropzone(Request $request){
        $ultimo = Digital::orderBy('PK_B_Digital', 'desc')->first();

        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No se recibió ningún archivo'], 400);
        }
        
        $image = new Archivos();
        $image->Arch_path = $request->file('file')->store('archivos', 'public');
        $image->Arch_path_size = $request->file('file')->getSize();
        $image->FK_B_Digital_Arch = $ultimo->PK_B_Digital;
        $image->T_Arch_Nombre=$request->file('file')->getClientOriginalName();
        $image->save();

        return response()->json([
            'success' => true,
            'message' => 'Se subio correctamente el archivo',
            
        ]);
        return redirect()->route('adminbien.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Digital $digital)
    {
        //
        
    }
    public function show2($id)
    {
        //detalle del bien digital
        $digital=Digital::where('PK_B_Digital', $id)
                ->first();
        $archivos=Archivos::where('PK_Archivos',$id)->get();

        return view('admin/Buscar/detalle_Digital',compact('digital','archivos'));
        
    }
    public function index_baja(Request $request){
        
        //mandar info
        $sistemas=Sistema::all();
        //aca faltaria el with
        $licencias = Digital::where('T_Determinacion',$request->determinacion)
                        ->where('FK_B_Digital_SistemaId', $request->sistemas)
                ->get();
        
        //return $request;
        //return $licencias;
        return view('admin/Buscar/encontrado_Baja',compact('licencias','sistemas'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Digital $digital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Digital $digital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Digital $digital)
    {
        //
    }
}
