<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
      
    use HasFactory;
    
    protected $fillable =['Fecha','comentario','usuario_id', 'turno_id'];
    protected $dates =[
        'Fecha'
    ];
    
    public function getFechaCreacionAttribute(){
        return $this->created_at_diffForHumans();
    }
    
     //relacion uno a muchos inverso porque varios informes pueden pertenecer a un usuario   
    public function User(){
        return $this->belongsTo('App\Models\User', 'usuario_id');
    }

        //relacion uno a muchos inverso porque varios informes pueden pertenecer a un turno   
        public function Turno(){
            return $this->belongsTo('App\Models\Turno', 'turno_id');
        }

        //---relacion muchos a nuchos inversa polimorica
        public function estados(){
            return $this->morphedByMany('App/Models/Estados', 'informeable');
        }
        //--relacion uno a muchos 
    public function informeable(){
        return $this->hasMany('App/Models/Informeable','informe_id' )->withTimestamps();
    }
        

        

}