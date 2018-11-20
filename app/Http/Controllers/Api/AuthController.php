<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;

class AuthController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        
        //调取登录流程
        $http = new Client();
        $response = $http->post('http://your-app.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 3,
                'client_secret' => 'CvNLjLyGLsyHlwwPqsVM4kUbYwCkdZOHSUSDGT9f',
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'scope' => '',
            ],
        ]);
        return response()->json($response->getBody());
    }

}
