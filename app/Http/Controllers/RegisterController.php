<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        $validated ->$request ->validate();

        $registerUser = new User;

        $registerUser ->first_name = $request->input('first_name');
        $registerUser ->last_name = $request->input('last_name');
        $registerUser ->email = $request->input('email');
        $registerUser ->phone = $request->input('phone');
        $registerUser ->password = Hash::input($request->get('password'));
        
        $saveUser = $registerUser ->save();

        if(!$saveUser){
            return response()->json($saveUser, 500, $headers);
        }
    }
}
