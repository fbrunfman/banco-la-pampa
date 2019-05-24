<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $request->request->add([
            'username' => $username,
            'password' => $password,
            'grant_type' => 'password',
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_CLIENT_SECRET')
        ]);

        $tokenRequest = Request::create(
            env('APP_URL').'/oauth/token',
            'post'
        );
        $response = Route::dispatch($tokenRequest);

        $json = (array) json_decode($response->getContent());
        if ($json['access_token']) {
            $user = User::where('correo', $username)->first();
            unset($user->password);
            $json['usuario'] = $user;
        }
        $response->setContent(json_encode($json));

        return $response;
    }

    public function logout() {
    	auth()->user()->tokens->each(function($token, $key) {
    		$token->delete();
    	});

    	return response()->json('Log out exitoso.');
    }
}