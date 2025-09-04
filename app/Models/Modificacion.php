<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modificacion extends Model
{
    //
    use HasFactory;
    protected $table = 'tbl_modificaciones_log';
    protected $primaryKey = 'PK_modificaciones'; 
    protected $fillable=[
        'FK_Modificaciones_UserId',
        'FK_Modificaciones_HardwareId',
        'FK_Modificaciones_SoftwareId',
        'Tdescripcion_modificaciones'
    ];

     public function usuario()
    {
        return $this->belongsTo(User::class,'FK_Modificaciones_UserId','id');
    }
    public function bien()
    {
        return $this->belongsTo(Bien::class,'FK_Modificaciones_HardwareId','PK_Hardware');
    }
    public function digital()
    {
        return $this->belongsTo(digital::class,'FK_Modificaciones_SoftwareId','PK_Software');
    }


}
