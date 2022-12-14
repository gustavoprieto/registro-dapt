<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

//spatie

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;





class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //relacion uno a muchos porque un equipo puede estar en varios info_equi_estado
    public function Informes(){
        return $this->hasMany('App\Models\Informe', 'usuario_id');
    }

        //relacion uno a muchos porque un equipo puede estar en varios info_equi_estado
        // public function roles(){
        //     return $this->belongsToMany('App\Models\Rol')->withTimestamps();;
        // }

    //relacion uno a muchos porque un equipo puede estar en varios info_equi_estado
    public function observar(){
        return $this->hasMany('App\Models\Observar', 'user_id');
    }
}