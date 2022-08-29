<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    
        protected $fillable =['Descripcion'];
    
        //relacion uno a muchos porque un tipo_equipo pueden tener a varios equipo    
        public function Equipo(){
            return $this->hasMany('App\Models\Equipo', 'tipoequipo_id')->withTimestamps();;
        }

                //relacion uno a muchos porque un tipo_equipo pueden tener a varios equipo    
        public function informeable(){
            return $this->hasMany('App\Models\Informeable', 'tipoequipo_id');
        }
}