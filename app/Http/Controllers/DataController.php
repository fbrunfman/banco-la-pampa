<?php

namespace App\Http\Controllers;

use App\User;
use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    public function subirDataEmpleados(Request $request)
    {
        set_time_limit(0);
        $username = $request->username;
        $password = $request->password;

        if (!($username == env('CSV_USUARIO') && $password == env('CSV_PASS'))) {
            return;
        }

    	$upload = $request->file('archivo');
    	$filePath = $upload->getRealPath();
    	$file = fopen($filePath, 'r');
    	$data = fgetcsv($file, 0, ';');

        $counter = 0;

    	while ($data) {
    		$noveno = preg_split('/\r/', $data[9]);

    		$equipo = $data[0];
    		$legajo = $data[1];
    		$apellido = $data[2];
            $nombre = $data[3];
            $apodo = $data[4];
    		$funcion = $data[5];
    		$area = $data[6];
    		$locacion = $data[7];
    		$correo = $data[8];
    		$fechaIngreso = $noveno[0];

    		$data = array_slice($data, 10);

    		if (count($noveno) == 2) {
    			array_unshift($data, $noveno[1]);
    		}

    		$empleado = new User();
    		$empleado->equipo = $equipo;
    		$empleado->legajo = $legajo;
    		$empleado->apellido = $apellido;
            $empleado->password = Hash::make($apellido);
            $empleado->nombre = $nombre;
            $empleado->apodo = $apodo;
    		$empleado->funcion = $funcion;
    		$empleado->area = $area;
    		$empleado->locacion = $locacion;
    		$empleado->correo = $correo;
    		$empleado->fecha_de_ingreso = $fechaIngreso;

    		$empleado->save();

            $counter++;

            echo $counter . '-';
    	}
    }

    public function subirArchivos(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (!($username == env('ADMIN_USUARIO') && $password == env('ADMIN_PASS'))) {
            return 'Error de autenticación';
        }

        $legajo = $request->subido_por;

        $subidoPor = User::where('legajo', $legajo)->first()->id;

        if (is_null($subidoPor)) {
            return 'El campo subido por es requerido';
        }

        $mes = $request->mes;

        $seccion = $request->seccion;

        if (is_null($seccion)) {
            return 'El campo sección es requerido';
        } else if ($seccion == 1) {
            $archivoGuardado = new Archivo();

            $archivoGuardado->nombre = $request->link;
            $archivoGuardado->ubicacion = '-';
            $archivoGuardado->seccion_id = $seccion;
            $archivoGuardado->subido_por = $subidoPor;
            $archivoGuardado->mes = $mes;


            $archivoGuardado->save();

            return 'Archivo guardado correctamente';

        } else {
            if($request->hasfile('archivo') && $seccion != 1) { 

              $archivo = $request->file('archivo');
              $extension = $archivo->getClientOriginalExtension();
              $nombre = time() . '.' . $extension;
              $archivo->move('archivos/', $nombre);

              $archivoGuardado = new Archivo();

              $archivoGuardado->nombre = $nombre;
              $archivoGuardado->ubicacion = 'archivos';
              $archivoGuardado->seccion_id = $seccion;
              $archivoGuardado->subido_por = $subidoPor;


              $archivoGuardado->save();

              return 'Archivo guardado correctamente';

            } else {
                return 'No se encontró ningún archivo';
            }
        }

    }

}
