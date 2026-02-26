<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Modificacion;
use App\Models\Prestamo;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        //valores
        
        //  Gate::authorize('create-comentario'); 
        //creacion del prestamo
        $data=$request->validate(
            [
                'Testado_fisico_prestamo' => 'required',
                'Tmotivo_prestamo' => 'required|min:1|max:150',
                'Tobservaciones_prestamo' => 'max:150',
                'Tdoc_ref_prestamo' => 'max:150',

                'Tresponsable_prestamo' => 'required|min:1|max:150',
                'Tcargo_prestamo' => 'required|min:1|max:150',
                'FK_Prestamo_AreaId' => 'required',
                
            ],
            [],
            [
                'Testado_fisico_prestamo'=> 'Estado',
                'Tmotivo_prestamo' => 'motivo',
                'Tobservaciones_prestamo' => 'Observacion',
                'Tdoc_ref_prestamo' => 'Documento de referencia',

                'Tresponsable_prestamo' => 'Usuario',
                'Tcargo_prestamo' => 'cargo',
                'FK_Prestamo_AreaId' => 'area',
                
            ]
        );
        // return  $request;


        $codigo= Bien::with('area','tipo','marca')
                            ->where('UK_Hardware_Codigo',$request->FK_Prestamo_HardwareId)
                            ->first();
        

        $agenteId=Auth::user()->id;
        $agente=Auth::user();
        $motivo = $request->Tmotivo_prestamo;
        $observacion = $request->Tobservaciones_prestamo;
        $usuario = $request->Tresponsable_prestamo;
        $cargo = $request->Tcargo_prestamo;
        $idHardware= $codigo->PK_Hardware;
        $idarea= $request->FK_Prestamo_AreaId;
        $estadoBien=$request->Testado_fisico_prestamo;
        $doReferncia=$request->Tdoc_ref_prestamo; //documento de referncia
        $fecha = Carbon::now()->format('d-m-Y');


    


        //vamos a sacar el numero para el correlativo

        $ultimo = Prestamo::where('Testado_prestamo', 1)
                        ->latest()
                        ->first();
        $añoActual = Carbon::now()->format('Y');

        if (!$ultimo) {
            //esto es si es el primero

            $prestamo = new Prestamo();

            $prestamo->FK_Prestamo_HardwareId =$idHardware ;
            $prestamo->FK_Prestamo_UserId =$agenteId ;
            $prestamo->FK_Prestamo_AreaId = $idarea;
            $prestamo->Nnumero_prestamo =1;
            $prestamo->Tresponsable_prestamo = $usuario;
            $prestamo->Tcargo_prestamo =$cargo ;
            $prestamo->Tmotivo_prestamo = $motivo ;
            $prestamo->Tobservaciones_prestamo =$observacion ;
            $prestamo->Testado_Hardware_prestamo = $estadoBien ;
            $prestamo->Tdoc_ref_prestamo = $doReferncia ; //referencia
            $prestamo->Testado_prestamo = 1 ;

            $prestamo->save();

            // agegar a tabla modificacion
            Modificacion::create([
                'FK_Modificaciones_UserId' => $agenteId,
                'FK_Modificaciones_HardwareId' => $codigo->PK_Hardware,
                'Tdescripcion_modificaciones'=> "7"
            ]);


            //area al cual va
            $AreaDestino= Area::where('PK_area',$request->FK_Prestamo_AreaId)->first();

            $logoBase64 = base64_encode(file_get_contents(public_path('images/logo-insti.png')));
                    $pdf =Pdf::loadView('admin.PDF.PrestamoPdf',[
                        'prestamo' =>$request,
                        'bien' => $codigo,
                        'numero' =>1,
                        'nombre'=> $agente,
                        'fecha' => $fecha,
                        'año'=> $añoActual,
                        'logoBase64'=> $logoBase64,
                        'area' =>$AreaDestino
                        
                    ]);
            
            //varaible de seccion
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>   'El prestamo fue registrado con exito'
            ]);
            return $pdf->download("Acta de salida N°1.pdf");




        } else {
            # Aca por si ya tiene uno
            $añoFinal = $ultimo->created_at->format('Y');
            if ($añoFinal == $añoActual) {

                //aca ambos pertenecen al mismo año, asi que aumenta
                $numero= $ultimo->Nnumero_prestamo+1;

                $prestamo = new Prestamo();

                $prestamo->FK_Prestamo_HardwareId =$idHardware ;
                $prestamo->FK_Prestamo_UserId =$agenteId ;
                $prestamo->FK_Prestamo_AreaId = $idarea;
                $prestamo->Nnumero_prestamo =$numero;
                $prestamo->Tresponsable_prestamo = $usuario;
                $prestamo->Tcargo_prestamo =$cargo ;
                $prestamo->Tmotivo_prestamo = $motivo ;
                $prestamo->Tobservaciones_prestamo =$observacion ;
                $prestamo->Testado_Hardware_prestamo = $estadoBien ;
                $prestamo->Testado_prestamo = 1 ;
                $prestamo->Tdoc_ref_prestamo = $doReferncia ; //referencia
                $prestamo->save();

                // agegar a tabla modificacion
                Modificacion::create([
                    'FK_Modificaciones_UserId' => $agenteId,
                    'FK_Modificaciones_HardwareId' => $codigo->PK_Hardware,
                    'Tdescripcion_modificaciones'=> "7"
                ]);


                //area al cual va
                $AreaDestino= Area::where('PK_area',$request->FK_Prestamo_AreaId)->first();

                $logoBase64 = base64_encode(file_get_contents(public_path('images/logo-insti.png')));
                        $pdf =Pdf::loadView('admin.PDF.PrestamoPdf',[
                            'prestamo' =>$request,
                            'bien' => $codigo,
                            'numero' =>$numero,
                            'nombre'=> $agente,
                            'fecha' => $fecha,
                            'año'=> $añoActual,
                            'logoBase64'=> $logoBase64,
                            'area' =>$AreaDestino
                            
                        ]);
                
                //varaible de seccion
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho',
                    'text'=>   'El prestamo fue registrado con exito'
                ]);
                return $pdf->download("Acta de salida N°{$numero}.pdf");


            }else {
                # aca se genera en un nuevo numero, desde 1...
                $prestamo = new Prestamo();

                $prestamo->FK_Prestamo_HardwareId =$idHardware ;
                $prestamo->FK_Prestamo_UserId =$agenteId ;
                $prestamo->FK_Prestamo_AreaId = $idarea;
                $prestamo->Nnumero_prestamo =1;
                $prestamo->Tresponsable_prestamo = $usuario;
                $prestamo->Tcargo_prestamo =$cargo ;
                $prestamo->Tmotivo_prestamo = $motivo ;
                $prestamo->Tobservaciones_prestamo =$observacion ;
                $prestamo->Testado_Hardware_prestamo = $estadoBien ;
                $prestamo->Testado_prestamo = 1 ;
                $prestamo->Tdoc_ref_prestamo = $doReferncia ; //referencia
                $prestamo->save();
    
                // agegar a tabla modificacion
                Modificacion::create([
                    'FK_Modificaciones_UserId' => $agenteId,
                    'FK_Modificaciones_HardwareId' => $codigo->PK_Hardware,
                    'Tdescripcion_modificaciones'=> "7"
                ]);
    
    
                //area al cual va
                $AreaDestino= Area::where('PK_area',$request->FK_Prestamo_AreaId)->first();
    
                $logoBase64 = base64_encode(file_get_contents(public_path('images/logo-insti.png')));
                        $pdf =Pdf::loadView('admin.PDF.PrestamoPdf',[
                            'prestamo' =>$request,
                            'bien' => $codigo,
                            'numero' =>1,
                            'nombre'=> $agente,
                            'fecha' => $fecha,
                            'año'=> $añoActual,
                            'logoBase64'=> $logoBase64,
                            'area' =>$AreaDestino
                            
                        ]);
                
                //varaible de seccion
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho',
                    'text'=>   'El prestamo fue registrado con exito'
                ]);
                return $pdf->download("Acta de salida N°1.pdf");
            }
        }
        
        
    }

    public function historial($id)
    {   
        
        // Gate::authorize('create-comentario'); 
        // historial de prestamos
        
    
        $areas=Area::all();

        $prestamos=Prestamo::where('FK_Prestamo_HardwareId',$id)
                ->with('area')
                ->with('usuario')
                 ->get();

        // return $prestamos
        
        return view('admin.HistorialPrestamo', compact('areas','prestamos') );

    }

    public function show($code)
    {
        $areas=Area::all();
        return view('admin.PrestamoIndex',compact('code','areas'));
    }

    public function edit($id)
    {
        $prestamo=Prestamo::where('PK_Prestamos',$id)
                ->with('bien')
                ->with('area')
                ->with('usuario')
                ->first();

        $areas = Area::all();
        // return $prestamo;
        return view('admin.PrestamoEdit',compact('prestamo','areas','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //

        $agenteId=Auth::user()->id;
        $agente=Auth::user();

        // return $request->Testado_fisico_prestamo;

        $EditPrestamo= Prestamo::find($request->id);

        $EditPrestamo->FK_Prestamo_AreaId = $request->FK_Prestamo_AreaId ;
        $EditPrestamo->Tresponsable_prestamo = $request->usuario ;
        $EditPrestamo->Tcargo_prestamo = $request->cargo ;
        $EditPrestamo->Tmotivo_prestamo = $request->Tmotivo_prestamo ;
        $EditPrestamo->Tobservaciones_prestamo = $request->Tobservaciones_prestamo ;
        $EditPrestamo->Testado_Hardware_prestamo = $request->Testado_fisico_prestamo ;
        $EditPrestamo->Tdoc_ref_prestamo = $request->Tdoc_ref_prestamo ;
        $EditPrestamo->save();

        $ultimo = Prestamo::where('PK_Prestamos', $request->id)
                        ->with('area')                        
                        ->first();
        // return $ultimo;
    
        $codigo= Bien::with('area','tipo','marca')
                ->where('UK_Hardware_Codigo',$request->FK_Prestamo_HardwareId)
                ->first();
        $fecha = Carbon::now()->format('d-m-Y');
        $añoActual = Carbon::now()->format('Y');
        $AreaDestino= Area::where('PK_area',$ultimo->FK_Prestamo_AreaId)->first();


        // return $ultimo;

        $logoBase64 = base64_encode(file_get_contents(public_path('images/logo-insti.png')));
        $pdf =Pdf::loadView('admin.PDF.PrestamoPdf',[
                            'prestamo' =>$ultimo,
                            'bien' => $codigo,
                            'numero' =>$ultimo->Nnumero_prestamo,
                            'nombre'=> $agente,
                            'fecha' => $fecha,
                            'año'=> $añoActual,
                            'logoBase64'=> $logoBase64,
                            'area' =>$AreaDestino
                            
        ]);
                
        //varaible de seccion
        session()->flash('swal',[
            'icon'=> 'success',
            'title'=> '!Bien hecho',
            'text'=>   'El prestamo fue registrado con exito'
        ]);
        return $pdf->download("Acta de salida N°{$ultimo->Nnumero_prestamo}.pdf");
        
        // return $EditPrestamo;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
