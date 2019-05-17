<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function subirDataEmpleados(Request $request)
    {
    	$upload = $request->file('upload-file');
    	$filePath = $upload->getRealPath();
    	$file = fopen($filePath, 'r');
    	$data = fgetcsv($file, 0, ';');

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
    		$empleado->password = $fechaIngreso;

    		$empleado->save();
    	}
    }
}
