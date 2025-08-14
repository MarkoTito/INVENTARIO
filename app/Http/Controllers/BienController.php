<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Category;
use App\Models\Comentario;
use App\Models\Image;
use App\Models\Sistema;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Gate; //acesos
use Illuminate\Support\Facades\Crypt; //seguridad osea cifrado

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('read-hardware');
        /*
        Forma de uno x uno
        $areas= Bien::where('PK_Hardware',1)
                ->with('area')
                ->with('tipo')
                ->first();
        */
        //forma q muestra todo con los metodos creado, mas facil q hacer un where dentro de otro... :)
        $bienes = Bien::with('area','tipo','estado')->paginate(5);
                //->where('FK_Hardware_EstadoId',1)    
        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        
        //return $bienes;
        return view('admin.buscar',compact('bienes','areas','tipos'));
    }

    public function index2(?Request $request){
        Gate::authorize('read-hardware');
        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        //$bien=$request->FK_Hardware_AreaId;

        if ($request->estado == "1") {
            $bienes = Bien::with('area','tipo','estado')
                    ->where('FK_Hardware_EstadoId',1)
                    ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                    ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                    ->get();
            
            return view('admin.encontrado',compact('bienes','areas','tipos'));
        } 
        if ($request->estado == "0") {
            
            $bienes = Bien::with('area','tipo','estado')
                    ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                    ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                    ->where('FK_Hardware_EstadoId',2)
                    ->get();
                //vereficar el t fisico mal escrito en el controller
            
            
            return view('admin.encontrado',compact('bienes','areas','tipos'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-hardware');
        //muestra el formulario de hardware
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin.ingresar', compact('areas','tipos') );
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create-hardware');
        //Inserccion de datos
        $request->validate(
                [
                'FK_Hardware_AreaId' => 'required',
                'FK_Hardware_TipoId' => 'required',
                'UK_Hardware_Codigo' => 'required|min:12|max:12|unique:hardware',
                'Tdescripcion_hardware' => 'required',
                'Testado_fisico_hardware'=> 'required',
                'Dadquisicion_hardware'=> ['required' , 'date', 'before_or_equal:today']
                ],
                [],
                [
                    'FK_Hardware_AreaId' => 'Area',
                    'FK_Hardware_TipoId'=> 'Tipo',
                    'UK_Hardware_Codigo' => 'Codigo patrimonial',
                    'Tdescripcion_hardware'=> 'Descripcion',
                    'Testado_fisico_hardware'=> 'Estado',
                    'Dadquisicion_hardware'=>'Fecha de Adiquiscion'

                ]
        );
        Bien::create($request->all());
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!El Bien fue registrado con Exito¡',
            'text'=>'PASO 1 COMPLEATADO'
            
        ]);
       
        return view('admin/Load_Imagen');
    }

    /**
     * Display the specified resource.
     */
    public function show1($idCifrado)
    {
        Gate::authorize('read-hardware');
        //para mostra solo un bien , con todo su detalle
        $id = Crypt::decryptString($idCifrado);
        $bien=Bien::where('PK_Hardware', $id)
                ->with('area')
                ->with('tipo')
                ->first();

        //para mostrar los comentarios del bien

        $comentarios=Comentario::where('FK_Comentario_HardwareId',$id)
                 ->get();
        
        //para mostrar las imagnes;
        $imagen = Image::where('FK_Imagenes_HardwareId',$id)->first();
        //return $imagen->Tpath_imagenes;
        return view('admin.detalle',compact('bien','comentarios','imagen'));
    }

    public function historial($idCifrado)
    {   
        Gate::authorize('read-hardware');
        $id = Crypt::decryptString($idCifrado);
        $bien=Bien::where('PK_Hardware', $id)
                ->with('area')
                ->with('tipo')
                ->first();
        
        $comentarios=Comentario::with('bien','usuario')
                ->where('FK_Comentario_HardwareId',$id)
                 ->get();
        
        //return $comentarios;
        return view('admin.historial',compact('comentarios','bien'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        //
        return 'hola desde el edit';
    }
    public function H_editar($idCifrado)
    {
        Gate::authorize('update-hardware');
        //formulario para editar un hardware
        $id = Crypt::decryptString($idCifrado);
        $bien=Bien::where('PK_Hardware', $id)
                ->with('area')
                ->with('tipo')
                ->first();
        //para mostrar las imagnes;
        $imagen = Image::where('FK_Imagenes_HardwareId',$id)->first();
        $areas=Area::all();
        $tipos = Tipo::all();
        //return $bien;
        return view('admin/editar_hardware',compact('bien','imagen','areas','tipos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bien $bien)
    {    
        Gate::authorize('update-hardware');    
        $New_Bien= Bien::find($bien->PK_Hardware);
        $New_Bien->FK_Hardware_AreaId = $request->FK_Hardware_AreaId;
        $New_Bien->UK_Hardware_Codigo = $request->UK_Hardware_Codigo;
        $New_Bien->Tdescripcion_hardware = $request->Tdescripcion_hardware;
        $New_Bien->Testado_fisico_hardware= $request->Testado_fisico_hardware;
        $New_Bien->FK_Hardware_TipoId = $request->FK_Hardware_TipoId;
        $New_Bien->Dadquisicion_hardware= $request->Dadquisicion_hardware;
        $New_Bien->save();
        session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho¡',
                    'text'=>'El bien fue Actualizado correctamente'
                ]);
    
        //return 'se registro correctamente';
        return redirect()->route('adminbien.index');
        
        
    }

    public function baja (Request $request,$bien)
    {
        Gate::authorize('bajar-hardware'); 
        if (!$request->T_Motivo_Baja || strlen($request->T_Motivo_Baja) > 125) {
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
        Bien::where('PK_Hardware',$bien)->update(
            [
                'Dbaja_hardware'=>$fecha,
                'Tmotivo_baja_hardware'=> $request->T_Motivo_Baja,
                'FK_Hardware_UserId'=>$usuario,
                'FK_Hardware_EstadoId' => 2                
            ]
        );
       
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Bien hecho',
            'text'=>   'El bien fue dado de baja correctamente'
        ]);

       return redirect()->route('adminbien.index');
    }

     public function Bajas()
    {
        Gate::authorize('read-hardware'); 
        //buscar todos los bienes de baja
        $bienes = Bien::with('area','tipo')
                ->where('FK_Hardware_EstadoId','Baja')    
                ->get();

        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin/Buscar/buscar_Baja',compact('bienes','areas','tipos'));
    }
    

    public function pdf($id)
    {
        Gate::authorize('read-hardware'); 
        $historial = Comentario::with('usuario')
                    ->where('FK_Comentario_HardwareId',$id)->get();

        $bien = Bien::where('PK_Hardware', $id)
                ->with('area')
                ->with('tipo')
                ->with('usuario')
                ->firstOrFail();    
        $pdf =Pdf::loadView('admin.PDF.pdf',[
            'bien' =>$bien,
            'comentarios' => $historial
        ]);
        $pdf->setPaper('A5', 'portrait');

        return $pdf->download("compra_{$bien->PK_Hardware}.pdf");
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        //Bajar bien
    }
    public function imagen($id){
        Gate::authorize('create-hardware'); 
        // se va a el formulario para ponerle su imagen
        return view('admin/entrega',compact('id'));
        
    }

    public function dropzone(Request $request){
        Gate::authorize('create-hardware'); 
        $ultimo = Bien::orderBy('PK_Hardware', 'desc')->first();

        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No se recibió ningún archivo'], 400);
        }

        $image = new Image();
        $image->Tpath_imagenes = $request->file('file')->store('imagenes', 'public');
        $image->Nsize_imagenes = $request->file('file')->getSize();
        $image->FK_Imagenes_HardwareId = $ultimo->PK_Hardware;
        $image->save();

        return response()->json([
            'success' => true,
            'message' => 'La imagen se subio correctamente',
            
        ]);
        // return redirect()->route('adminbien.index');
        
    }
}
