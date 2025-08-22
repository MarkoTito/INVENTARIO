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
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt; //seguridad osea cifrado
use Illuminate\Validation\ValidationException;


class DigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('read-software'); 
        //mostramos en la tabla


        $sistemas= Sistema::all();
        $digitales= Digital::with('determinacion')
                ->paginate(6);
        return view('admin/Buscar/buscar_Digital',compact('digitales','sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-software'); 
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
        Gate::authorize('create-software'); 

        try {
            $request->validate(
                    [
                    'FK_Software_DeterminacionId' => 'required'
                    ],
                    [],
                    [
                        'FK_Software_DeterminacionId' => "Determinacion",
                    ]
            );
            if ($request->FK_Software_DeterminacionId == 2) {
                
                $request->validate(
                        [
                        'FK_Software_AreaId' => 'required',
                        'FK_Software_SistemaId' => 'required',
                        'Tnombre_software' => 'required',
                        'Tnombre_software' => 'required|unique:software',
                        'Thost_software' => 'required|max:30|unique:software',
                        'Dfe_Inicio_software'=> ['required' , 'date', 'before_or_equal:today'],
                        ],
                        [],
                        [
                            'FK_Software_AreaId'=>'Area',
                            'FK_Software_SistemaId'=> 'Sistema',
                            'Tnombre_software'=>'Nombre del sistema',
                            'Thost_software' => 'Host',
                            'Dfe_Inicio_software'=> 'Fecha de Incio'
                        ]
                );
                Digital::create($request->all());
                session()->flash('swal',[
                        'icon'=> 'success',
                        'title'=> '!Bien hecho',
                        'text'=>'El bien fue registrado correctamente'
                ]);
                return view('admin/Load_Archivos'); 
            } else {
                $request->validate(
                        [
                        'FK_Software_AreaId' => 'required',
                        'FK_Software_SistemaId' => 'required',
                        'Tnombre_software' => 'required|unique:software',
                        'Thost_software' => 'required|max:30|unique:software',
                        'Dfe_vencimiento_software'=> ['required' , 'date', 'after_or_equal:today'],
                        'Dfe_Inicio_software'=> ['required' , 'date', 'before_or_equal:today'],
                        
                        ],
                        [],
                        [
                            'FK_Software_AreaId'=>'Area',
                            'FK_Software_SistemaId'=> 'Sistema',
                            'Tnombre_software'=>'Nombre del sistema',
                            'Dfe_vencimiento_software' => 'Fecha de vencimiento',
                            'Thost_software' => 'Host',
                            'Dfe_Inicio_software'=> 'Fecha de Incio'
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
            
        } catch (ValidationException $e) {
            $areas=Area::all();
            $sistemas = Sistema::all();
            $errors = implode("\n", $e->validator->errors()->all());
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '!Upss',
                'text' => $errors
            ]);
            return view('admin.ingresa_sofware', compact('areas','sistemas') );
            
        }

        
       
    
    }



    public function dropzone(Request $request){
        Gate::authorize('create-software'); 
        $ultimo = Digital::orderBy('PK_Software', 'desc')->first();

        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No se recibió ningún archivo'], 400);
        }
         
        $image = new Archivos();
        $image->Tpath_archivos = $request->file('file')->store('archivos', 'public');
        $image->Nsize_archivo = $request->file('file')->getSize();
        $image->FK_Archivos_SoftwareId = $ultimo->PK_Software;
        $image->Tnombre_archivo=$request->file('file')->getClientOriginalName();
        $image->save();

        return response()->json([
            'success' => true,
            'message' => 'Se subio correctamente el archivo',
            
        ]);
        return redirect()->route('admindigital.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Digital $digital)
    {
        //
        
    }
    public function show2($idCifrado)
    {
        Gate::authorize('read-software'); 
        //detalle del bien digital
        $id = Crypt::decryptString($idCifrado);
        $digital=Digital::with('determinacion','area','sistema')
                    ->where('PK_Software', $id)
                ->first();
        $archivos=Archivos::where('FK_Archivos_SoftwareId',$id)->get();

        //return $id;
        return view('admin/Buscar/detalle_Digital',compact('digital','archivos'));
        
    }
    public function index_baja(Request $request){
        Gate::authorize('read-software'); 
        //buscar software
        //mandar info
        $sistemas=Sistema::all();
        $licencias = Digital::with('determinacion','area','sistema')
                        ->where('FK_Software_DeterminacionId',$request->determinacion)
                        ->where('FK_Software_SistemaId', $request->FK_Software_SistemaId)
                ->get();

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
