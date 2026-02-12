<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use App\Models\Area;
use App\Models\Bajas;
use App\Models\Bien;
use App\Models\Category;
use App\Models\Comentario;
use App\Models\Digital;
use App\Models\Image;
use App\Models\Marca;
use App\Models\Modificacion;
use App\Models\Modificaciones;
use App\Models\Sedes;
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
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;


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
        $bienes = Bien::with('area','tipo','estado')
                ->orderBy('PK_Hardware', 'desc')
                ->paginate(30);
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
        $tope=50;
        $request->validate(
                [
                'FK_Hardware_AreaId' => 'required',
                'FK_Hardware_TipoId' => 'required',
                ],
                [],
                [
                    'FK_Hardware_AreaId' => 'Area',
                    'FK_Hardware_TipoId'=> 'Tipo'
                ]
        );
        $areas=Area::all();
        $tipos = Tipo::all();
        $bien=$request->FK_Hardware_AreaId;
        
        if ($request->estado == "1") {
            //tquiere todo de areas y tipo
            if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_EstadoId',1)
                        ->get();

                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }
                


                


            }
            //solo quiere todas los tipos
            if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId != "1" ) {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_EstadoId',1)
                        ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                        ->get();
                
                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }

                

            }

            // solo quiere todas las area
            if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_EstadoId',1)
                        ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                        ->get();

                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }
                

            } else {//no quiere todos en ningun caso
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_EstadoId',1)
                        ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                        ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                        ->get();

                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }


                

            }
            
        } 
        if ($request->estado == "0") {
            //quiere todo de areas y tipo
            if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();

                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }

                

            }
            //solo quiere todas las area
            if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();
                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }

                
            }
            //solo quiere todas los tipos
            if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId !="1") {
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();
                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }

                
            }
            else {//no quiere todos en ningun caso
                $toma = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                        ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();

         
                if ($toma->isEmpty()) {

                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => '!Upss',
                        'text' => 'No existe ningun bien con esa realacion'
                    ]);
                    
                    return redirect()->route('adminbien.index');


                } else {
                    if ($toma->count()>=$tope) {
                        $bienes = $toma->take($tope);
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontraron mas de '.$tope .' bienes¡',
                            'text'=>'Solo se mostraran los '. $tope. ' primeros bienes'
                        ]);                    
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
    
                    } else {
                        $bienes = $toma;
    
                        session()->flash('swal',[
                            'icon'=> 'success',
                            'title'=> '!Se encontro Bien¡',
                            'text'=>''
                        ]);
                        return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                        
                    }
                }


                

            }
            
        }

    }

    public function index3(Request $request){
        //metodo de busqueda con CODIGO
        Gate::authorize('read-hardware');
        $code=$request->UK_Hardware_Codigo;
        if (strlen($code) >12 || strlen($code) <10) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '!Upss',
                'text' => 'No Ingreso correctamente el codigo'
            ]);
            return redirect()->route('adminbien.index');
        }else{
            //$id = Crypt::decryptString($request->UK_Hardware_Codigo);
            $bienes=Bien::where('UK_Hardware_Codigo', $code)
                    ->with('area')
                    ->with('tipo')
                    ->get();
            
            
            if ($bienes->isEmpty()) {
                session()->flash('swal', [
                    'icon' => 'error',
                    'title' => '!Upss',
                    'text' => 'El Codigo no exite'
                ]);
                
                return redirect()->route('adminbien.index');
            }
            
            else{
                
                
                //para mostrar los comentarios del bien
                $comentarios=Comentario::where('FK_Comentario_HardwareId',$code)
                         ->get();
                //return $bien;
                $areas=Area::all();
                $tipos = Tipo::all();
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Se encontro Bien¡',
                    'text'=>''
                ]);
                return view('admin.encontrado',compact('bienes','areas','tipos','request'));
                
            }
            
        }

    }

    /**
     * Show the form for creating a new resource.g0
     */
    public function create()
    {
        Gate::authorize('create-hardware');
        //muestra el formulario de hardware
        $areas=Area::where('Nestado_area','1')->get();
        $tipos = Tipo::where('Nestado_tipo','1')->get();
        $marcas = Marca::where('Nestado_marca','1')->get();
        $sedes= Sedes::where('Nestado_sede','1')->get();
        return view('admin.ingresar', compact('areas','tipos','marcas','sedes') );
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create-hardware');
        //Inserccion de datos
        if ($request->FK_Hardware_MarcasId == "1" || $request->FK_Hardware_MarcasId == "2") {
            $request->validate(
                    [
                    'FK_Hardware_AreaId' => 'required',
                    'FK_Hardware_TipoId' => 'required',
                    'FK_Hardware_MarcasId' => 'required',
                    'FK_Hardware_SedeId' => 'required',
                    'UK_Hardware_Codigo' => 'required|min:10|max:12|unique:hardware',
                    'Tdescripcion_hardware' => 'required|max:180',
                    'Testado_fisico_hardware'=> 'required',
                    'Dadquisicion_hardware'=> ['required' , 'date', 'before_or_equal:today']
                    ],
                    [],
                    [
                        'FK_Hardware_AreaId' => 'Area',
                        'FK_Hardware_TipoId'=> 'Tipo',
                        'FK_Hardware_MarcasId' => 'Marca',
                        'FK_Hardware_SedeId' => 'Sede',
                        'UK_Hardware_Codigo' => 'Codigo patrimonial',
                        'Tdescripcion_hardware'=> 'Descripcion',
                        'Testado_fisico_hardware'=> 'Estado',
                        'Dadquisicion_hardware'=>'Fecha de Adiquiscion'
    
                    ]
            );
            
            $creado=Bien::create($request->all());
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!El Bien fue registrado con Exito¡',
                    'text'=>'PASO 1 COMPLEATADO'
                    
                ]);

            $FK_Modificaciones_UserId=Auth::user()->id;

            Modificacion::create([
                'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                'FK_Modificaciones_HardwareId' => $creado->PK_Hardware,
                'Tdescripcion_modificaciones'=> "1"
            ]);
            
            return view('admin/Load_Imagen');



        } else {
                $request->validate(
                    [
                    'FK_Hardware_AreaId' => 'required',
                    'FK_Hardware_TipoId' => 'required',
                    'FK_Hardware_MarcasId' => 'required',
                    'FK_Hardware_SedeId' => 'required',
                    'UK_Hardware_Codigo' => 'required|min:10|max:12|unique:hardware',
                    'Tmodelo_hardware' => 'required|max:30',
                    'Tserie_hardware' => 'required|max:25',
                    'Tdescripcion_hardware' => 'required|max:180',
                    'Testado_fisico_hardware'=> 'required',
                    'Dadquisicion_hardware'=> ['required' , 'date', 'before_or_equal:today']
                    ],
                    [],
                    [
                        'FK_Hardware_AreaId' => 'Area',
                        'FK_Hardware_TipoId'=> 'Tipo',
                        'FK_Hardware_MarcasId' => 'Marca',
                        'FK_Hardware_SedeId' => 'Sede',
                        'Tmodelo_hardware' => 'Modelo',
                        'Tserie_hardware' => 'Serie',
                        'UK_Hardware_Codigo' => 'Codigo patrimonial',
                        'Tdescripcion_hardware'=> 'Descripcion',
                        'Testado_fisico_hardware'=> 'Estado',
                        'Dadquisicion_hardware'=>'Fecha de Adiquiscion'
    
                    ]
            );
            
            $creado= Bien::create($request->all());
            session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!El Bien fue registrado con Exito¡',
                    'text'=>'PASO 1 COMPLEATADO'
                    
                ]);
            $FK_Modificaciones_UserId=Auth::user()->id;

            Modificacion::create([
                'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                'FK_Modificaciones_HardwareId' => $creado->PK_Hardware,
                'Tdescripcion_modificaciones'=> "1"
            ]);
            
            return view('admin/Load_Imagen');
        }
        
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
                ->with('marca')
                ->with('sede')
                ->first();

        //para mostrar los comentarios del bien

        $comentarios=Comentario::where('FK_Comentario_HardwareId',$id)
                 ->get();
        
        //para mostrar las imagnes;
        $imagen = Image::where('FK_Imagenes_HardwareId',$id)->first();
        //return $imagen->Tpath_imagenes;
        //ver bjas
        $bajas = Bajas::where('FK_Bajas_HardwareId',$id)
                    ->where('Testado_baja',0)
                    ->get();

        $ultimoBaja= Bajas::where('FK_Bajas_HardwareId', $id)
                   ->where('Testado_baja', 1)
                   ->latest() // por defecto ordena por created_at DESC
                   ->first();

        //return $ultimoBaja->created_at;
        return view('admin.detalle',compact('bien','comentarios','imagen','bajas','ultimoBaja'));
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
    public function EdiTHistorial($idCifrado)
    {   
        Gate::authorize('read-hardware');
        $comentarios=Comentario::with('bien','usuario')
                ->where('PK_Comentario',$idCifrado)
                 ->first();
        //return $comentarios;
        return view('admin.EditaReparar',compact('comentarios'));
        
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
                ->with('marca')
                ->with('area')
                ->with('sede')
                ->with('tipo')
                ->first();
        //para mostrar las imagnes;
        $imagen = Image::where('FK_Imagenes_HardwareId',$id)->first();

        $areas=Area::all();
        $tipos = Tipo::all();
        $marcas= Marca::all();
        $sedes= Sedes::all();

        //return $bien;
        return view('admin/editar_hardware',compact('bien','imagen','areas','tipos','marcas','sedes'));
        
    }
    public function index_bajar($code)
    {   
         //formulario de baja
        Gate::authorize('create-comentario'); 
        
        return view('admin.bajar', compact('code') );

    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bien $bien)
    {    
        Gate::authorize('update-hardware');
        $request->validate(
                [
                'FK_Hardware_AreaId' => 'required',
                'FK_Hardware_TipoId' => 'required',
                'FK_Hardware_SedeId' =>'required',
                'UK_Hardware_Codigo' => "required|min:10|max:12|unique:hardware,UK_Hardware_Codigo,{$bien->PK_Hardware},PK_Hardware",
                'Tdescripcion_hardware' => 'required',
                'Testado_fisico_hardware'=> 'required',
                'Dadquisicion_hardware'=> ['required' , 'date', 'before_or_equal:today'],
                'FK_Hardware_MarcasId'=> 'required',
                'Tmodelo_hardware'=> 'required',
                
                'Tserie_hardware'=> 'required',
                ],
                [],
                [
                    'FK_Hardware_AreaId' => 'Area',
                    'FK_Hardware_TipoId'=> 'Tipo',
                    'FK_Hardware_SedeId'=> 'Sede',
                    'UK_Hardware_Codigo' => 'Codigo patrimonial',
                    'Tdescripcion_hardware'=> 'Descripcion',
                    'Testado_fisico_hardware'=> 'Estado',
                    'Dadquisicion_hardware'=>'Fecha de Adiquiscion',
                    'FK_Hardware_MarcasId'=> 'Marca',
                    'Tmodelo_hardware'=> 'Model',
                    'Tserie_hardware'=> 'serie',

                ]
        );

        $New_Bien= Bien::find($bien->PK_Hardware);

         //guardar en el registro
        $FK_Modificaciones_UserId=Auth::user()->id;
        $FK_Modificaciones_HardwareId= $New_Bien->PK_Hardware;



        $New_Bien->FK_Hardware_AreaId = $request->FK_Hardware_AreaId;
        $New_Bien->UK_Hardware_Codigo = $request->UK_Hardware_Codigo;
        $New_Bien->Tdescripcion_hardware = $request->Tdescripcion_hardware;
        $New_Bien->Testado_fisico_hardware= $request->Testado_fisico_hardware;
        $New_Bien->FK_Hardware_TipoId = $request->FK_Hardware_TipoId;
        $New_Bien->Dadquisicion_hardware= $request->Dadquisicion_hardware;
        $New_Bien->FK_Hardware_SedeId = $request->FK_Hardware_SedeId;
        //nuevos
        $New_Bien->FK_Hardware_MarcasId = $request->FK_Hardware_MarcasId;
        $New_Bien->Tmodelo_hardware= $request->Tmodelo_hardware;
        $New_Bien->Tserie_hardware = $request->Tserie_hardware;

        $New_Bien->save();
        //guardar en tabla de modificacion

        Modificacion::create([
                'FK_Modificaciones_UserId' => $FK_Modificaciones_UserId,
                'FK_Modificaciones_HardwareId' => $bien->PK_Hardware,
                'Tdescripcion_modificaciones'=> "2"
            ]);

        session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho¡',
                    'text'=>'El bien fue Actualizado correctamente'
                ]);
    
        //return 'se registro correctamente';

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
            ->where('FK_Comentario_HardwareId', $id)
            ->orderBy('created_at', 'desc') 
            ->take(4) 
            ->get();
        $bien = Bien::where('PK_Hardware', $id)
                ->with('sede')
                ->with('area')
                ->with('tipo')
                ->with('marca')
                ->firstOrFail();    

        $baja = Bajas::where('FK_Bajas_HardwareId', $id)
             ->with('usuarioBaja')
             ->orderBy('PK_Bajas', 'desc')
             ->first();


        $logoBase64 = base64_encode(file_get_contents(public_path('images/logo-insti.png')));
        $pdf =Pdf::loadView('admin.PDF.pdf',[
            'bien' =>$bien,
            'comentarios' => $historial,
            'baja'=> $baja,
            'logoBase64'=> $logoBase64
        ]);
        $pdf->setPaper('A5', 'portrait');

        return $pdf->download("Acta de baja $bien->UK_Hardware_Codigo.pdf");
       
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
    public function agregar()
    {
        Gate::authorize('read-hardware'); 
        $areas=Area::paginate(20);
        $tipos = Tipo::all();
        $sistemas = Sistema::all();
        $users= User::all();
        $sedes = Sedes::all();
        
        //return $users;
        return view('admin/agregar',compact('areas','tipos','sistemas','users','sedes'));
        
    }


    public function export()
    {
        //MUESTRRA LAS MODIFICACIONES
        //return $users;
        $modificaciones = Modificacion::with('usuario','bien','digital')
                ->orderBy('PK_modificaciones', 'desc')
                ->paginate(20);

        
        //return $modificaciones;
        return view('admin/Exportacion/exportacion',compact('modificaciones'));
    }
    public function exportDatps(Request $request)
    {        
        $areas = Area::all();
        $tipos = Tipo::all();
        
        if ($request->form == 1) { //aca compara si es con fecha
            if ($request->estado == "1") {
                $hardware = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->area)
                        ->where('FK_Hardware_TipoId',$request->tipo)
                        ->whereYear('Dadquisicion_hardware',$request->adquisicion)
                        ->where('FK_Hardware_EstadoId',1)
                        ->get();
                //return $bienes;
                $cantidad = $hardware->count();
                if ($cantidad==0) {
                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => 'No existe relacion',
                        'text' => 'Intente Nuevamente'
                    ]);
                    return view('admin/Exportacion/exportacion',compact('areas','tipos'));
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Se encontro Relacion¡',
                    'text'=>'Se encontraron: '.$cantidad .' Dato(s)'
                    
                ]);
                $bienes = $hardware->take(25);
                return view('admin.Exportacion.exportacionEncontrada', compact('bienes','areas','tipos','request','cantidad'));
            } 
            if ($request->estado == "0") {
                
                $hardware = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->area)
                        ->where('FK_Hardware_TipoId',$request->tipo)
                        ->whereYear('Dadquisicion_hardware',$request->adquisicion)
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();
                    //vereficar el t fisico mal escrito en el controller
                $cantidad = $hardware->count();
                if ($cantidad==0) {
                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => 'No existe relacion',
                        'text' => 'Intente Nuevamente'
                    ]);
                    return view('admin/Exportacion/exportacion',compact('areas','tipos'));
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Se encontro Relacion¡',
                    'text'=>'Se encontraron: '.$cantidad .' Dato(s)'
                    
                ]);
                $bienes = $hardware->take(25);
                return view('admin.Exportacion.exportacionEncontrada', compact('bienes','areas','tipos','request','cantidad'));
            }
        } else { //aca sin fecha
            if ($request->estado == "1") {
                $hardware = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->area)
                        ->where('FK_Hardware_TipoId',$request->tipo)
                        ->where('FK_Hardware_EstadoId',1)
                        ->get();
                //return $bienes;
                $cantidad = $hardware->count();
                if ($cantidad==0) {
                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => 'No existe relacion',
                        'text' => 'Intente Nuevamente'
                    ]);
                    return view('admin/Exportacion/exportacion',compact('areas','tipos'));
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Se encontro Relacion¡',
                    'text'=>'Se encontraron: '.$cantidad .' Dato(s)'
                    
                ]);
                $bienes = $hardware->take(25);
                return view('admin.Exportacion.exportacionEncontrada', compact('bienes','areas','tipos','request','cantidad'));
                
                
            } 
            if ($request->estado == "0") {
                
                $hardware = Bien::with('area','tipo','estado')
                        ->where('FK_Hardware_AreaId',$request->area)
                        ->where('FK_Hardware_TipoId',$request->tipo)
                        ->where('FK_Hardware_EstadoId',2)
                        ->get();
                    //vereficar el t fisico mal escrito en el controller
                $cantidad = $hardware->count();
                if ($cantidad==0) {
                    session()->flash('swal', [
                        'icon' => 'error',
                        'title' => 'No existe relacion',
                        'text' => 'Intente Nuevamente'
                    ]);
                    return view('admin/Exportacion/exportacion',compact('areas','tipos'));
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Se encontro Relacion¡',
                    'text'=>'Se encontraron: '.$cantidad .' Dato(s)'
                    
                ]);
                $bienes = $hardware->take(25);
                return view('admin.Exportacion.exportacionEncontrada', compact('bienes','areas','tipos','request','cantidad'));
            }
        }
    }

    public function dowloadExport(Request $request)
    {
        $fecha = Carbon::now()->format('dmY');
        $bien=$request->FK_Hardware_AreaId;

        if ($request->form == "1") { //con code
            $bienes = Bien::with('area','tipo','estado')
                ->where('UK_Hardware_Codigo',$request->UK_Hardware_Codigo)
                ->get();
            return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
        } else {
            if ($request->estado == "1") {
                //tquiere todo de areas y tipo
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->get();
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                }
                //solo quiere todas los tipos
                if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId != "1" ) {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->get();
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                }
    
                // solo quiere todas las area
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->get();
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                } else {//no quiere todos en ningun caso
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->get();
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                }
                
            } 
            if ($request->estado == "0") {
                //quiere todo de areas y tipo
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                }
                //solo quiere todas las area
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                        
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
                }
                //solo quiere todas los tipos
                if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId !="1") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
                }
                else {//no quiere todos en ningun caso
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                        
                    
                    
                    return Excel::download(new \App\Exports\bienExport($bienes),'E-'.$fecha.'.xlsx');
    
                }
                
            }
        }
        



        

        


        
        
        
    }




    public function dowloadExportPdf(Request $request)
    {
        $fecha = Carbon::now()->format('dmY');

        $bien=$request->FK_Hardware_AreaId;

        if ($request->form == "1") { //con code
            $bienes = Bien::with('area','tipo','estado')
                ->where('UK_Hardware_Codigo',$request->UK_Hardware_Codigo)
                ->get();
            $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                'bienes' =>$bienes,
                'fecha' => $fecha
            ]);
            return $pdf->download("PDF-$fecha.pdf");
            
        } else {
            if ($request->estado == "1") {
                //tquiere todo de areas y tipo
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->get();
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                }
                //solo quiere todas los tipos
                if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId != "1" ) {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->get();
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                }
    
                // solo quiere todas las area
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->get();
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                } else {//no quiere todos en ningun caso
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',1)
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->get();
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                }
                
            } 
            if ($request->estado == "0") {
                //quiere todo de areas y tipo
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId == "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                }
                //solo quiere todas las area
                if ($request->FK_Hardware_AreaId== "1" && $request->FK_Hardware_TipoId != "2") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                        
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
                }
                //solo quiere todas los tipos
                if ($request->FK_Hardware_TipoId == "2" && $request->FK_Hardware_AreaId !="1") {
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                        
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
                }
                else {//no quiere todos en ningun caso
                    $bienes = Bien::with('area','tipo','estado')
                            ->where('FK_Hardware_AreaId',$request->FK_Hardware_AreaId)
                            ->where('FK_Hardware_TipoId',$request->FK_Hardware_TipoId)
                            ->where('FK_Hardware_EstadoId',2)
                            ->get();
                        
                    
                    
                    $pdf =Pdf::loadView('admin.PDF.exportacionPdf',[
                        'bienes' =>$bienes,
                        'fecha' => $fecha
                    ]);
                    return $pdf->download("PDF-$fecha.pdf");
    
                }
                
            }
        }
        
    }
}
