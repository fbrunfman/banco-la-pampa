<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // $http = new \GuzzleHttp\Client;
        // try {
        //     $response = $http->post('http://localhost:8000/oauth/token', [
        //         'form_params' => [
        //             'grant_type' => 'password',
        //             'client_id' => '2',
        //             'client_secret' => 'lGQXRysJhZAZ16nMp7p1waab88sl25fcygNeua9M',
        //             'username' => $request->username,
        //             'password' => $request->password
        //         ]
        //     ]);
        //     return $response->getBody();
        // } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        //     if ($e->getCode() === 400) {
        //         return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
        //     } else if ($e->getCode() === 401) {
        //         return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
        //     }
        //     return response()->json('Something went wrong on the server.', $e->getCode());
        // }

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

        // if($response->getStatusCode() == 200){
        //     $this->storeAccessToken($response->getContent());
        // }

        return $response;
    }

    public function logout() {
    	auth()->user()->tokens->each(function($token, $key) {
    		$token->delete();
    	});

    	return response()->json('Log out exitoso.');
    }
}
