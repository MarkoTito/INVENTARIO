<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    //
    protected $table = 'file';

    protected $fillable=[
        'FK_B_Digital_File',
        'T_Nombre_File'
    ];
}
