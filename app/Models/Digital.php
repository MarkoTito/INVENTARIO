<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Digital extends Model
{
    //
    protected $table = 'software';
     protected $primaryKey = 'PK_Software'; 
    protected $fillable=[
        'FK_Software_DeterminacionId',
        'FK_Software_AreaId',
        'FK_Software_SistemaId',

        'Tnombre_software',
        'Thost_software',
        'Dfe_Inicio_software',
        'Dfe_vencimiento_software', //ojito aca
    ];

   
    public function determinacion()
    {
        return $this->belongsTo(determinacion::class,'FK_Software_DeterminacionId','PK_determinacion');
    }
    public function area()
    {
        return $this->belongsTo(Area::class,'FK_Software_AreaId','PK_area');
    }
    public function sistema()
    {
        return $this->belongsTo(sistema::class,'FK_Software_SistemaId','PK_sistema');
    }


}
