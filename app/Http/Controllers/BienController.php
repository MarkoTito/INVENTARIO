<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Category;
use App\Models\Comentario;
use App\Models\Sistema;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        Forma de uno x uno
        $areas= Bien::where('PK_B_Fisico',1)
                ->with('area')
                ->with('tipo')
                ->first();
        */
        //forma q muestra todo con los metodos creado, mas facil q hacer un where dentro de otro... :)
        $bienes = Bien::with('area','tipo')
                //->where('T_Estado','Activo')    
                ->get();

        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        
        //return $bienes;
        return view('admin.buscar',compact('bienes','areas','tipos'));
    }

    public function index2(?Request $request){
        
        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        $bien=$request->FK_B_Fisico_Area;

        if ($request->estado == "1") {
            $bienes = Bien::with('area','tipo')
                    ->where('T_Estado','Activo')
                    ->where('FK_B_Fisico_Area',$request->FK_B_Fisico_Area)
                    ->where('FK_B_Fisico_TipoId',$request->FK_B_Fisico_TipoId)
                    ->get();
            
            return view('admin.encontrado',compact('bienes','areas','tipos'));
        } 
        if ($request->estado == "0") {
            
            $bienes = Bien::with('area','tipo')
                    ->where('FK_B_Fisico_Area',$request->FK_B_Fisico_Area)
                    ->where('FK_B_Fisico_TipoId',$request->FK_B_Fisico_TipoId)
                    ->where('T_Estado','Baja')
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
        //validacion
        $request->validate([
                'FK_B_Fisico_TipoId' => 'required',
                'FK_B_Fisico_Area' => 'required',
                'UK_Codigo_Pratimonial' => 'required|min:12|max:12|unique:b_fisicos',
                'T_B_Descripcion' => 'required',
                'T_Estado_Fisico'=> 'required',
                'D_Adquisicion'=> 'required'
        ]);
        $bien = new Bien();
        //esto se podria evitar con carga masivoa . pero se vera despues
        $bien->FK_B_Fisico_Area=$request->FK_B_Fisico_Area;
        $bien->FK_B_Fisico_TipoId=$request->FK_B_Fisico_TipoId;

        $bien->T_B_Descripcion=$request->T_B_Descripcion;
        $bien->UK_Codigo_Pratimonial=$request->UK_Codigo_Pratimonial;
        $bien->T_Estado_Fisico=$request->T_Estado_Fisico;
        $bien->T_Estado="Activo";
        $bien->D_Adquisicion=$request->D_Adquisicion;
        $bien->save();
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Bien hecho',
            'text'=>'El bien fue registrado correctamente'
        ]);

        //return 'se registro correctamente';
        return redirect()->route('adminbien.index');

    }

    /**
     * Display the specified resource.
     */
    public function show1($id)
    {
        //para mostra solo un bien , con todo su detalle
        $bien=Bien::where('PK_B_Fisico', $id)
                ->with('area')
                ->with('tipo')
                ->first();

        //para mostrar los comentarios del bien

        $comentarios=Comentario::where('FK_Comentario_FisicoId',$id)
                 ->get();
        
        //return $comentarios;

        return view('admin.detalle',compact('bien','comentarios'));
    }

    public function historial($id)
    {   
        $bien=Bien::where('PK_B_Fisico', $id)
                ->with('area')
                ->with('tipo')
                ->first();
        
        $comentarios=Comentario::where('FK_Comentario_FisicoId',$id)
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bien $bien)
    {
        //
    }

    public function baja (Request $request,$bien)
    {
        
        if (!$request->T_Motivo_Baja || strlen($request->T_Motivo_Baja) > 125) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '!Upss',
                'text' => 'No introdujo un motivo o es muy largo'
            ]);
        return redirect()->route('adminbien.index');
    }
        
        $usuario=Auth::user()->name;
        $fecha=Carbon::now();
        ////Bajar bien
        Bien::where('PK_B_Fisico',$bien)->update(
            [
                'D_Baja'=>$fecha,
                'T_Motivo_Baja'=> $request->T_Motivo_Baja,
                'B_User_Name_Baja'=>$usuario,
                'T_Estado' => "Baja"                
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
        //buscar todos los bienes de baja
        $bienes = Bien::with('area','tipo')
                ->where('T_Estado','Baja')    
                ->get();

        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin/Buscar/buscar_Baja',compact('bienes','areas','tipos'));
    }
    public function index_baja(Request $request){
        
        //mandar info
        $areas=Area::all();
        $tipos = Tipo::all();

        $bienes = Bien::with('area','tipo')
                ->where('T_Estado','Baja')
                ->where('FK_B_Fisico_Area',$request->FK_B_Fisico_Area)
                ->where('FK_B_Fisico_TipoId',$request->FK_B_Fisico_TipoId)
                ->get();
        
        // $bienes;
        return view('admin/Buscar/encontrado_Baja',compact('bienes','areas','tipos'));
    }

    public function pdf($id){
        $historial = Comentario::where('FK_Comentario_FisicoId',$id)->get();
        $jefa = User::where('tipo_User', 'Jefe')
            ->orderBy('id', 'desc')
            ->first();

        $bien = Bien::where('PK_B_Fisico', $id)
                ->with('area')
                ->with('tipo')
                ->firstOrFail();
        
        $pdf =Pdf::loadView('admin.PDF.pdf',[
            'bien' =>$bien,
            'comentarios' => $historial,
            'jefa'=> $jefa,
        ]);
        $pdf->setPaper('A5', 'portrait');

        return $pdf->download("compra_{$bien->PK_B_Fisico}.pdf");
        
       // return $bien;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        //Bajar bien
    }

    public function dropzone(Request $request){
        // Valida que haya un archivo
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No se recibió ningún archivo'], 400);
        }

        // Guarda el archivo
        $path = Storage::put('/images', $request->file('file'));

        // Devuelve respuesta correcta
        return response()->json([
            'success' => true,
            'path' => $path,
            'message' => 'Archivo subido correctamente'
        ]);
    }
    
    /*
    return response()->json([
            
        'path'=>$path,
    ]);
    */
}
