<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bajas extends Model
{
    //
    protected $table = 'bajas';
    protected $primaryKey = 'PK_Bajas'; 
    protected $fillable=[
        'FK_Bajas_HardwareId',
        'FK_Baja_UserId',
        'Tdescripcion_baja',
        //aanulacion
        'FK_null_Baja_UserId',
        'Tdescripcion_null_baja',
        'Testado_baja',
        'Tusuario_baja',
        'Tcargo_baja',
        'Tcontrato_baja',
        'Tdoc_ref_baja'
    ];

    public function bienBaja()
    {
        return $this->belongsTo(Bien::class,'FK_Bajas_HardwareId','PK_Hardware');
    }

    public function usuarioBaja()
    {
        return $this->belongsTo(User::class,'FK_Baja_UserId','id');
    }
    public function usuarioNullBaja()
    {
        return $this->belongsTo(User::class,'FK_null_Baja_UserId','id');
    }

}
