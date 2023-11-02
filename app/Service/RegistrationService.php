<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class RegistrationService {

    public function register(Request $request)
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
    }

}