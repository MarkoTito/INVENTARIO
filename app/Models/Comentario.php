<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentarios';
    protected $primaryKey = 'PK_Comentario'; 
    protected $fillable=[
        'FK_Comentario_HardwareId',
        'FK_Comentario_UserId',
        'Tdescripcion_comentario',
        'Testado_fisico_comentario',
        'Tobservacion_comentario',
        'Trecomendacion_comentario',
        'Nnumero_comentario'
    ];
    
    public function bien()
    {
        return $this->belongsTo(Bien::class,'FK_Comentario_FisicoId','PK_Hardware');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class,'FK_Comentario_UserId','id');
    }

}
