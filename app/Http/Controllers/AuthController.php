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
            'client_id' => config('logging.api_client_id'),
            'client_secret' => config('logging.api_client_secret')
        ]);


        $tokenRequest = Request::create(
            config('app.url').'/oauth/token',
            'post'
        );
        $response = Route::dispatch($tokenRequest);

        $json = (array) json_decode($response->getContent());
        if (array_key_exists('access_token', $json)) {
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
    }
}
