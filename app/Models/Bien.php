<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    
    protected $table = 'b_fisicos';
    //siempre es bueno poner cual es nombre de pk
    protected $primaryKey = 'PK_B_Fisico'; 

    protected $fillable=[
        'FK_B_Fisico_Area',
        'FK_B_Fisico_TipoId',
        'T_B_Descripcion',
        'UK_Codigo_Pratimonial',
        'D_Adquisicion',
        'T_Estado_Fisico',
    ];
    
     public function area()
    {
        return $this->belongsTo(Area::class,'FK_B_Fisico_Area','PK_Area');
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class,'FK_B_Fisico_TipoId','PK_Tipo');
    }
    //aca falta agregar mas coneccionde de la BD

    


    
}
