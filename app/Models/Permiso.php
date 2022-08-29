<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsuarioRol;
class Permiso extends Model
{
    use HasFactory;
        //relacion  muchos porque varios roles puede tener varios permisos
        public function Rol(){
            return $this->belongsToMany('App\Models\Rol')->withTimestamps();
            }
}