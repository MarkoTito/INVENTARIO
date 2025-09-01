<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    //
    protected $table = 'modelos';
    protected $primaryKey = 'PK_modelo'; 
     protected $fillable=[
        'Tdescripcion_modelo'
    ];
}
