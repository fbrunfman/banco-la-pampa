<?php

namespace App\Http\Controllers;

use App\Puntaje;
use App\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $preguntas = Pregunta::with('respuestas')->get();

        if ($request->exists('mes')) {
            $mes = $request->query('mes');
            $preguntas = $preguntas->where('mes', $mes);
            if ($request->exists('hecha')) {
                $equipo_id = $request->query('hecha');
                $puntaje = Puntaje::where([['equipo_id', $equipo_id], ['mes', $mes]])->first();
                $preguntas['hecha'] = !is_null($puntaje);
            }
        }

        return response()->json($preguntas);
    }

    public function guardarPuntaje(Request $request)
    {
        $puntaje = new Puntaje();

        $puntaje->equipo_id = $request->equipo_id;
        $puntaje->mes = $request->mes;
        $puntaje->puntaje = $request->puntaje;

        return response()->json($puntaje->save());
    }
}
