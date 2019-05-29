<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

	public function admin_credential_rules(array $data)
	{
	  $messages = [
	    'password-actual.required' => 'Por favor, ingrese su contraseña actual',
	    'password.required' => 'Por favor, ingrese la nueva contraseña',
	  ];

	  $validator = Validator::make($data, [
	    'password-actual' => 'required',
	    'password' => 'required|same:password',
	    'confirma-password' => 'required|same:password',     
	  ], $messages);

	  return $validator;
	}  

    public function postCredentials(Request $request)
	{
	  if(Auth::Check())
	  {
	    $request_data = $request->All();
	    $validator = $this->admin_credential_rules($request_data);
	    if($validator->fails())
	    {
	      return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
	    }
	    else
	    {  
	      $current_password = Auth::User()->password;           
	      if(Hash::check($request_data['password-actual'], $current_password))
	      {           
	        $user_id = Auth::User()->id;                       
	        $obj_user = User::find($user_id);
	        $obj_user->password = Hash::make($request_data['password']);;
	        $obj_user->save(); 
	        return response()->json([
	        	'message' => 'Cambio de password exitoso.',
	        	'code' => 200
	        ]);
	      }
	      else
	      {           
	        $error = array('password-actual' => 'Por favor, ingresa la correcta contraseña actual');
	        return response()->json(array('error' => $error), 400);   
	      }
	    }        
	  }  
	}

	public function usuarios(Request $request)
	{
		if (Auth::check()) {
			$users = User::all();
			if ($request->exists('equipo')) {
				$equipo = $request->query('equipo');
				$users = $users->where('equipo', $equipo);
			}

			return response()->json($users);
			
		} else {
	        return response()->json(array('error' => 'No está logueado'), 400); 
		}
	}
}
