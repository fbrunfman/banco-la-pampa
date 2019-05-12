<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'dni', 'fecha_nacimiento', 'area', 'sucursal', 'equipo', 'capitan'
    ];

    protected $table = 'empleados';

    public $timestamps = false;
}
