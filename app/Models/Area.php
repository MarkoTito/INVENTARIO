<?php

namespace App\Models;

use App\Http\Controllers\BienController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $fillable=[
        'UK_Nombre_area'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class,'FK_Software_AreaId','PK_area');
    }
}
