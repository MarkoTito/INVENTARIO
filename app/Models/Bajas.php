<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bajas extends Model
{
    //
    protected $table = 'bajas';
    protected $fillable=[
        'FK_Bajas_HardwareId',
        'FK_Baja_UserId',
        'Tdescripcion_baja',
        //aanulacion
        'FK_null_Baja_UserId',
        'Tdescripcion_null_baja',
        'Testado_baja'
    ];

    public function bienBaja()
    {
        return $this->belongsTo(Bien::class,'FK_Bajas_HardwareId','PK_Hardware');
    }

     public function usuarioBaja()
    {
        return $this->belongsTo(User::class,'FK_Baja_UserId','id');
    }

}
