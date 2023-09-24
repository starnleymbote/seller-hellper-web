<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\RegisterUser;
use Illuminate\Support\Facades\Hash;
use App\Exception\CustomExceptionHandler;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {


        $registerUser = new User;

        $registerUser ->first_name = $request->input('first_name');
        $registerUser ->last_name = $request->input('last_name');
        $registerUser ->email = $request->input('email');
        $registerUser ->phone = $request->input('phone');
        $registerUser ->uuid = Str::uuid();
        $registerUser ->role_id = $request->input('role_id');
        $registerUser ->password = Hash::make($request->input('password'));
    
        $saveUser = $registerUser ->save();

        if(!$saveUser){
            throw new CustomExceptionHandler();

        }
    
        return (new RegisterUser($registerUser))
        ->additional([
            'message' => 'User created successfully', 
            'status' => 'success',
            'statuscode'=> 201,
        ]);

    }
}
