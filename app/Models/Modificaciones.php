<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modificaciones extends Model
{
    // recien creado
    protected $table = 'tbl_modificaciones_log';
    protected $fillable=[
        'FK_Modificaciones_UserId',
        'FK_Modificaciones_HardwareId'
    ];
}
