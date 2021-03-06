<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntaje extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'equipo_id', 'mes', 'puntaje'
    ];

    protected $table = 'puntajes';

    public $timestamps = false;
}
