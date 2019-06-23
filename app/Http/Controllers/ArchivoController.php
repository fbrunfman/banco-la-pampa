<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\ArchivoUsuarios;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
	public function index(Request $request)
	{
		$archivos = Archivo::with('archivoUsuarios.user')->get();

        if ($request->exists('seccion')) {
                $seccion_id = $request->query('seccion');

                $archivos = $archivos->where('seccion_id', $seccion_id);
            }

		return response()->json($archivos);
	}

    public function like(Request $request)
    {
    	$archivo_id = $request->archivo_id;
    	$user_id = $request->user_id;

    	$archivo = Archivo::find($archivo_id);

    	if (!$archivo) {
    		return response()->json([
    			'error' => 'Archivo no encontrado',
    			'code' => 1
    		]);
    	}

    	$archivo->likes += 1;

    	if (!$archivo->save()) {
    		return response()->json([
    			'error' => 'Error al guardar el archivo',
    			'code' => 2
    		]);
    	}

    	$archivo_usuarios = new ArchivoUsuarios();

    	$archivo_usuarios->archivo_id = $archivo_id;
    	$archivo_usuarios->user_id = $user_id;

    	if (!$archivo_usuarios->save()) {
    		return response()->json([
    			'error' => 'Error al guardar el archivo',
    			'code' => 3
    		]);
    	}

    	return response()->json([
    		'message' => 'Like guardado correctamente',
    		'code' => 200
    	]);

	}
}
