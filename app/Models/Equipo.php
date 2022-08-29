<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable =['Nombre','tipoequipo_id'];
        //relacion uno a muchos inverso porque varios equipos puede estar en un tipo_equipo
        public function Tipo_equipo(){
            return $this->belongsTo('App\Models\TipoEquipo', 'tipoequipo_id');
        }

        //relacion uno a muchos porque un tipo_equipo pueden tener a varios equipo    
        public function informeable(){
            return $this->hasMany('App\Models\Informeable', 'equipo_id');
        }
}