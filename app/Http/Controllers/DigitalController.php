<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Digital;
use App\Models\file;
use App\Models\Sistema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //sacar el ultimo id de digital
        $ultimo = Digital::latest('PK_B_Digital')->first(); // ultimo
        


        $request->validate([
                'FK_B_Digital_AreaId' => 'required',
                'FK_B_Digital_SistemaId' => 'required',
                'T_Nombre_Digital' => 'required',
                'T_Host' => 'required',
                'D_F_Inicio'=> 'required',
                
        ]);

        //subir a la bd de digital
        $bDigital = new Digital();
        $bDigital->FK_B_Digital_AreaId=$request->FK_B_Digital_AreaId;
        $bDigital->FK_B_Fisico_TipoId=1;
        $bDigital->FK_B_Digital_SistemaId=$request->FK_B_Digital_SistemaId;
        $bDigital->T_Nombre_Digital=$request->T_Nombre_Digital;
        $bDigital->T_Host=$request->T_Host;
        $bDigital->D_F_Inicio=$request->D_F_Inicio;
        $bDigital->T_Determinacion	=$request->T_Determinacion;
        $bDigital->D_F_Vencimiento=$request->D_F_Vencimiento;
        $bDigital->T_Estado_Digital="Activo";
        $bDigital->save();

        //subir a la bd de file, el cual se junta a la bd de digitales
            
        if (!$ultimo) {
            $id_digital = 1;
            $max_sixe = (int)ini_get('upload_max_filesize')*1024;
            $files = $request->file('T_Nombre_File');
            $usuario= Auth::user()->name;
    
            if ($request->hasFile('T_Nombre_File')) {
                foreach ($files as $archivo) {
                        if (Storage::putFileAs('/public/'.$usuario. '/',$archivo, 
                                            $archivo->getClientOriginalName())) {
                            file::create([
                                'FK_B_Digital_File' => $id_digital,
                                'T_Nombre_File' => $archivo->getClientOriginalName()
                            ]);
                            
                        }       
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho',
                    'text'=>'El bien fue registrado correctamente'
                ]);
    
                //return 'se registro correctamente';
                return redirect()->route('adminbien.index');
            } else {
                session()->flash('swal', [
                    'icon' => 'error',
                    'title' => '!Upss',
                    'text' => 'No introdujo algun campo'
                ]);
                //return 'se registro correctamente';
                return redirect()->route('adminbien.index');
            }
                
            return "no hay ninguno";

        } else {
            
            $ultimo_id= $ultimo->PK_B_Digital;
            $max_sixe = (int)ini_get('upload_max_filesize')*1024;
            $files = $request->file('T_Nombre_File');
            $usuario= Auth::user()->name;
    
            if ($request->hasFile('T_Nombre_File')) {
                foreach ($files as $archivo) {
                        if (Storage::putFileAs('/public/'.$usuario. '/',$archivo, 
                                            $archivo->getClientOriginalName())) {
                            file::create([
                                'FK_B_Digital_File' => $ultimo_id,
                                'T_Nombre_File' => $archivo->getClientOriginalName()
                            ]);
                            
                        }       
                }
                session()->flash('swal',[
                    'icon'=> 'success',
                    'title'=> '!Bien hecho',
                    'text'=>'El bien fue registrado correctamente'
                ]);
    
                //return 'se registro correctamente';
                return redirect()->route('adminbien.index');
            } else {
                session()->flash('swal', [
                    'icon' => 'error',
                    'title' => '!Upss',
                    'text' => 'No introdujo algun campo'
                ]);
                //return 'se registro correctamente';
                return redirect()->route('adminbien.index');
            }
                
            return "si existe alguno";


        }
        
         
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Digital $digital)
    {
        //
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
