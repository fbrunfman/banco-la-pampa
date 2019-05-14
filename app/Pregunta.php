<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregunta', 'mes'
    ];

    protected $table = 'preguntas';

    public $timestamps = false;

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }
}
