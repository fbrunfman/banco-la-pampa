<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'nombre', 'ubicacion', 'mes', 'seccion_id', 'subido_por', 'likes'
    ];

    protected $table = 'archivos';

    public $timestamps = false;

    public function archivoUsuarios()
    {
    	return $this->hasMany(ArchivoUsuarios::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'subido_por');
    }
}
