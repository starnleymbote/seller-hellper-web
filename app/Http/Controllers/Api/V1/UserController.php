<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(LoginRequest $login)
    {

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            
            $user = Auth::user();

            $success['token'] =  $user->createToken($login ->input('token_name'))->plainTextToken; 
            $success['user'] =  $user;

            return response()->json($success);
        }
        else
        {

            return response()->json(['error'=>'Access denied. Wrong credentials'], 401);
        }

        if (Auth::attempt([
            'email' => $login ->input('email'),
        'password' => $login ->input('password')
        ])) {
            $login->session()->regenerate();
 
            return $login;
        }
        return $login;
    }
}
