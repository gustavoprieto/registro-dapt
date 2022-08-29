<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informeable extends Model
{
    use HasFactory;
       
        //relacion uno a muchos inverso 
        public function equipo(){
            return $this->belongsTo('App\Models\Equipo', 'equipo_id');
        }

                //relacion uno a muchos inverso 
        public function estado(){
            return $this->belongsTo('App\Models\Estado', 'estado_id');
        }

                //relacion uno a muchos inverso 
        public function informe(){
            return $this->belongsTo('App\Models\Informe', 'informe_id');
        }

                        //relacion uno a muchos inverso 
        public function tipoequipo(){
            return $this->belongsTo('App\Models\TipoEquipo', 'tipoequipo_id');
        }
    
}