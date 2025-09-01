<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    //
    protected $table = 'sedes';
    protected $primaryKey = 'PK_sede'; 
     protected $fillable=[
        'UK_Nombre_sede',
        'Tubicacion_sede'
    ];
}
