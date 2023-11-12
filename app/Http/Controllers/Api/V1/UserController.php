<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LoginResource;

class UserController extends Controller
{
    public function login(LoginRequest $login)
    {

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            
            $user = Auth::user();

            $success['token'] =  $user->createToken($login ->input('token_name'))->plainTextToken; 
            $success['user'] =  $user;


            $user_collection = new LoginResource($success);
            
            $user_collection->additional([
                'status' => 200,
                'message' => 'Resource retrieved successfully',
            ]);

            return $user_collection;
            return response()->json(LoginResource::collection($success));
        }
        else
        {

            return response()->json(['error'=>'Access denied. Wrong credentials'], 401);
        }

        
    }
}
