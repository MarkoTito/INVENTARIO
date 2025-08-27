<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    //
    protected $table = 'sistemas';
    protected $primaryKey = 'PK_sistema'; 
    protected $fillable=[
        'Tdescripcion_sistema'
    ];
}
