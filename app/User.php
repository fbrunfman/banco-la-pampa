<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password', 'apellido', 'nombre', 'apodo', 'funcion', 'area', 'locacion', 'correo', 'fecha_de_inicio', 'equipo', 'capitan', 'legajo', 'cambio_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'cambio_password'
    ];

    public $timestamps = false;

    public function findForPassport($username)
    {
        return $this->where('legajo', $username)->first();
    }
}
