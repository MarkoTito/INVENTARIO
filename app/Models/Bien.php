<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    use HasFactory;
    /*
    protected $fillable=[
        'FK_B_Fisico_TipoId',
        'FK_B_Fisico_Area',
        'T_B_Descripcion',
        'UK_Codigo_Pratimonial',
        'D_Adquisicion',
        'T_Estado'
    ];
    */


    protected $table = 'b_fisicos';
}
