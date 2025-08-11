<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Bien;
use App\Models\Comentario;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dejar comentario de repacion
        //muestra el formulario
        $areas=Area::all();
        $tipos = Tipo::all();
        return view('admin.reparar', compact('areas','tipos') );

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
        //creacion del comentario
        $data=$request->validate(
            [
                'T_Descripcion_Comentario' => 'required',
                'FK_Comentario_FisicoId' => 'required|min:12|max:12',
                'T_Estado' => 'required',
            ],
            [],
            [
                'T_Descripcion_Comentario'=> 'Comentario',
                'FK_Comentario_FisicoId' => 'Codigo Patrimonial',
                'T_Estado' => 'Estado del Bien'
            ]
        );
        //BUSQUEDA DEL USUARIO
        $usuario=Auth::user()->name;
        //BUSQUEDA DEL BIEN
        $codigo= Bien::where('UK_Hardware_Codigo',$request->FK_Comentario_FisicoId)
                            ->first();
        $bien= Bien::where('UK_Hardware_Codigo',$request->FK_Comentario_FisicoId)
                            ->get();

        if ($bien->isEmpty()) {
             //varaible de seccion
            session()->flash('swal',[
                'icon'=> 'error',
                'title'=> '!Upss',
                'text'=>   'El Bien no existe'
            ]);
            return redirect()->route('adminbien.index');
        } else {
        
            //ANTIGUA FORMA
            $coment = new Comentario();
            //esto se podria evitar con carga masivoa . pero se vera despues
            $coment->FK_Comentario_FisicoId=$codigo->PK_Hardware;
            $coment->T_Descripcion_Comentario=$request->T_Descripcion_Comentario;
            $coment->T_Estado=$request->T_Estado;
            $coment->T_User_Name=$usuario;
            $coment->save();
    
            //varaible de seccion
            session()->flash('swal',[
                'icon'=> 'success',
                'title'=> '!Bien hecho',
                'text'=>   'El comentario fue registrado con exito'
            ]);
            //return 'se registro correctamente';
            return redirect()->route('adminbien.index');
            
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
