<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Digital extends Model
{
    //
    protected $table = 'b_digital';

    protected $fillable=[

        'FK_B_Digital_AreaId',
        'FK_B_Digital_SistemaId',
        'T_Nombre_Digital',
        'T_Host',
        'D_F_Inicio',
        'T_Determinacion',
        'D_F_Vencimiento', //ojito aca
    ];



}
