<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Estado extends Model
{
    use HasFactory;
    protected $fillable =['Descripcion','valor'];
        //relacion uno a muchos porque un tipo_equipo pueden tener a varios equipo    
        public function informeable(){
            return $this->hasMany('App\Models\Informeable', 'estado_id');
        }
}