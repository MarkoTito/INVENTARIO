<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    //
    
    protected $table = 'Hardware';
    //siempre es bueno poner cual es nombre de pk
    protected $primaryKey = 'PK_Hardware'; 

    protected $fillable=[
        'FK_Hardware_AreaId',
        'FK_Hardware_TipoId',
        'FK_Hardware_MarcasId',
        'Tmodelo_hardware',
        'Tserie_hardware',
        'Tdescripcion_hardware',
        'UK_Hardware_Codigo',
        'Dadquisicion_hardware',
        'Testado_fisico_hardware',
    ];
    
    public function area()
    {
        return $this->belongsTo(Area::class,'FK_Hardware_AreaId','PK_area');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class,'FK_Hardware_EstadoId','PK_estado');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class,'FK_Hardware_UserId','id');
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class,'FK_Hardware_TipoId','PK_tipo');
    }
    public function marca()
    {
        return $this->belongsTo(marca::class,'FK_Hardware_MarcasId','PK_marca');
    }

    


    


    
}
