<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArchivoUsuarios extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'archivo_id', 'user_id'
    ];

    protected $table = 'archivo_usuarios';

    public $timestamps = false;

    public function archivo()
    {
        return $this->belongsTo('App\Archivo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
