<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use App\Models\Area;
use App\Models\Determinacion;
use App\Models\Digital;
use App\Models\file;
use App\Models\Modificacion;
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
        $areas=Area::where('Nestado_area','1')->get();
        $sistemas = Sistema::where('Testado_sistema','1')->get();
        return view('admin.ingresa_sofware', compact('areas','sistemas') );
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create-software'); 
        $idCifrado = null;
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
                $creado=Digital::create($request->all());

                $FK_Modificaciones_UserId=Auth::user()->id;

                Modificacion::create([
                    'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                    'FK_Modificaciones_SoftwareId' => $creado->PK_Software,
                    'Tdescripcion_modificaciones'=> "1"
                ]);



                session()->flash('swal',[
                        'icon'=> 'success',
                        'title'=> '!Bien hecho',
                        'text'=>'El bien fue registrado correctamente'
                ]);
                return view('admin/Load_Archivos',compact('idCifrado')); 
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
                $creado=Digital::create($request->all());
                $FK_Modificaciones_UserId=Auth::user()->id;

                Modificacion::create([
                    'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                    'FK_Modificaciones_SoftwareId' => $creado->PK_Software,
                    'Tdescripcion_modificaciones'=> "1"
                ]);


                session()->flash('swal',[
                        'icon'=> 'success',
                        'title'=> '!Bien hecho',
                        'text'=>'El bien fue registrado correctamente'
                ]);
                return view('admin/Load_Archivos',compact('idCifrado')); 
            }
       
    
    }



    public function dropzone(Request $request ,?int $idCifrado = null ){
        
        Gate::authorize('create-software'); 

        if ($idCifrado === null) {
            # code...
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

        }else { //documento de cancelacion

            if (!$request->hasFile('file')) {
                return response()->json(['error' => 'No se recibió ningún archivo'], 400);
            }
             
            $image = new Archivos();
            $image->Tpath_archivos = $request->file('file')->store('archivos', 'public');
            $image->Nsize_archivo = $request->file('file')->getSize();
            $image->FK_Archivos_SoftwareId = $idCifrado;
            $image->Tnombre_archivo=$request->file('file')->getClientOriginalName();
            $image->save();

            $software= Digital::where('PK_Software',$idCifrado)->update([
                    'Nestado_software'=>0
                ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Se cancelo correctamente la licencia',
                
            ]);
            return redirect()->route('admindigital.index');
        }
        
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
        if ( $request->FK_Software_SistemaId==1) {
            # todos los sistemas
            $licencias = Digital::with('determinacion','area','sistema')
                            ->where('FK_Software_DeterminacionId',$request->determinacion)
                    ->get();
    
            return view('admin/Buscar/encontrado_Baja',compact('licencias','sistemas'));

        } else {
            # filtro de sistemas
            $licencias = Digital::with('determinacion','area','sistema')
                            ->where('FK_Software_DeterminacionId',$request->determinacion)
                            ->where('FK_Software_SistemaId', $request->FK_Software_SistemaId)
                    ->get();
    
            return view('admin/Buscar/encontrado_Baja',compact('licencias','sistemas','request'));
        }
        
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Digital $digital)
    {
        
        Gate::authorize('update-software');

        $determinacion = Determinacion::all();
        $sistemas= Sistema::all();
        $areas = Area::all();
        return view('admin/Buscar/editar_Digital',compact('digital','determinacion','sistemas','areas'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function Canceldropzone($idCifrado)
    {
        //aca
        //return $idCifrado;
        return view('admin/Load_Archivos',compact('idCifrado')); 
    }



    public function update(Request $request, Digital $digital)
    {
        
    }

    public function actualizar(Request $request)
    {
        
        $nuevo=Digital::where('PK_Software',$request->PK_Software)->first();



        if ($request->FK_Software_DeterminacionId== 2) {
            # indeterminado (2) sin fecha , x eso sera null
            $nuevo->FK_Software_AreaId = $request->FK_Software_AreaId ;
            $nuevo->FK_Software_TipoId = $request->FK_Software_TipoId ; //
            $nuevo->FK_Software_SistemaId = $request->FK_Software_SistemaId ;//
            $nuevo->FK_Software_EstadoId = $request->FK_Software_EstadoId ;//
            $nuevo->FK_Software_DeterminacionId= $request->FK_Software_DeterminacionId;
    
            $nuevo->Tnombre_software = $request->Tnombre_software ;//
            $nuevo->Thost_software = $request->Thost_software ;//
            
            $nuevo->Dfe_Inicio_software = $request->Dfe_Inicio_software ;//
            $nuevo->Dfe_vencimiento_software = NULl ;//
            $nuevo->save();
            // return $request;
            $FK_Modificaciones_UserId=Auth::user()->id;
    
            Modificacion::create([
                    'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                    'FK_Modificaciones_SoftwareId' => $request->PK_Software,
                    'Tdescripcion_modificaciones'=> "2"
                ]);
    
    
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>'El Software fue editado correctamente'
            ]);
            return redirect()->route('admindigital.index');



        } else {
            # determinado (1) con fehca
            $nuevo->FK_Software_AreaId = $request->FK_Software_AreaId ;
            $nuevo->FK_Software_TipoId = $request->FK_Software_TipoId ; //
            $nuevo->FK_Software_SistemaId = $request->FK_Software_SistemaId ;//
            $nuevo->FK_Software_EstadoId = $request->FK_Software_EstadoId ;//
            $nuevo->FK_Software_DeterminacionId= $request->FK_Software_DeterminacionId;
    
            $nuevo->Tnombre_software = $request->Tnombre_software ;//
            $nuevo->Thost_software = $request->Thost_software ;//
            
            $nuevo->Dfe_Inicio_software = $request->Dfe_Inicio_software ;//
            $nuevo->Dfe_vencimiento_software = $request->Dfe_vencimiento_software ;//
            $nuevo->save();
            // return $request;
            $FK_Modificaciones_UserId=Auth::user()->id;
    
            Modificacion::create([
                    'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                    'FK_Modificaciones_SoftwareId' => $request->PK_Software,
                    'Tdescripcion_modificaciones'=> "2"
                ]);
    
    
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>'El Software fue editado correctamente'
            ]);
            return redirect()->route('admindigital.index');
        }
        

        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Digital $digital)
    {
        //
        return "hola";
    }
}
