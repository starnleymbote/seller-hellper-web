<?php

use App\Models\User;
use Illuminate\Support\Str;     
use Illuminate\Support\Facades\Hash;

// it('has userregistration page', function () {
//     $response = $this->get('/userregistration');

//     $response->assertStatus(200);
// });

it('is able to register', function(){

        $user = new User;

        $user ->first_name = 'John';
        $user ->last_name = 'Doe';
        $user ->surname = 'Smith';
        $user ->phone = '254700000011';
        $user ->email = 'seller@example.com';
        $user ->role_id = 2;
        $user ->uuid = Str::uuid();
        $user ->password = Hash::make('password');

        $response = $user ->save();
        $response->assertStatus(201);
});
