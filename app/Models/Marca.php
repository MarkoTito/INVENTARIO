<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $table = 'marcas';
    protected $primaryKey = 'PK_marca'; 
     protected $fillable=[
        'UK_Nombre_marca'
    ];
}
