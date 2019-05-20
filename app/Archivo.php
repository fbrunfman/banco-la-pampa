<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'nombre', 'ubicacion', 'seccion', 'likes'
    ];

    protected $table = 'archivos';

    public $timestamps = false;
}
