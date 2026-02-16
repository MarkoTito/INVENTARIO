<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
    protected $table = 'Prestamos';
    protected $primaryKey = 'PK_Prestamos'; 


    
    public function area()
    {
        return $this->belongsTo(Area::class,'FK_Prestamo_AreaId','PK_area');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class,'FK_Prestamo_UserId','id');
    }

    public function bien()
    {
        return $this->belongsTo(Bien::class,'FK_Prestamo_HardwareId','PK_Hardware');
    }








}
