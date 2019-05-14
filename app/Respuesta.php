<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'respuesta', 'pregunta_id', 'es_correcta'
    ];

    protected $table = 'respuestas';

    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }
}
