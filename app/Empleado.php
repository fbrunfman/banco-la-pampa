<?php

namespace App;

use Laravel\Passport\hasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{

    use Notifiable, hasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'fecha_nacimiento', 'area', 'sucursal', 'equipo', 'capitan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'dni'
    ];

    protected $table = 'empleados';

    public $timestamps = false;

    public function findForPassport($username)
    {
        return $this->where('apellido', $username)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        return Hash::check($password, $user->dni);
    }
}
