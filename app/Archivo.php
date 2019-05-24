<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'nombre', 'ubicacion', 'mes', 'seccion_id', 'likes'
    ];

    protected $table = 'archivos';

    public $timestamps = false;

    public function archivoUsuarios()
    {
    	return $this->hasMany(ArchivoUsuarios::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
