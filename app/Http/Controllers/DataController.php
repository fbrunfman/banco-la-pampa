<?php

namespace App\Http\Controllers;

use App\User;
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
    		$septimo = preg_split('/\r/', $data[7]);

    		$equipo = $data[0];
    		$legajo = $data[1];
    		$apellidoNombre = $data[2];
    		$funcion = $data[3];
    		$area = $data[4];
    		$locacion = $data[5];
    		$correo = $data[6];
    		$fechaIngreso = $septimo[0];

    		$data = array_slice($data, 8);

    		if (count($septimo) == 2) {
    			array_unshift($data, $septimo[1]);
    		}

    		$empleado = new User();
    		$empleado->equipo = $equipo;
    		$empleado->legajo = $legajo;
    		$empleado->apellido_nombre = $apellidoNombre;
    		$empleado->funcion = $funcion;
    		$empleado->area = $area;
    		$empleado->locacion = $locacion;
    		$empleado->correo = $correo;
    		$empleado->password = Hash::make($fechaIngreso);

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
            return;
        }

        $seccion = $request->seccion;

        if($request->hasfile('archivo')) { 

          $archivo = $request->file('archivo');
          $extension = $archivo->getClientOriginalExtension();
          $nombre = time() . '.' . $extension;
          $file->move('archivos/', $filename);

        } else {
            return 'No se encontró ningún archivo';
        }

    }

}
