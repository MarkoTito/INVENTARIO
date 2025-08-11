<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentario';
    protected $fillable=[
        'FK_Comentario_FisicoId',
        'FK_Comentario_UsuarioId',
        'T_Descripcion_Comentario',
        'T_Estado',
    ];
    
    public function bien()
    {
        return $this->belongsTo(Bien::class,'FK_Comentario_FisicoId','PK_Hardware');
    }

}
