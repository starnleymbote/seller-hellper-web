<?php

use App\Models\User;
use App\Models\Roles;
use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

// test('new users can register1', function () {
//     $response = $this->post('/register', [
//         'name' => 'Test User',
//         'email' => 'test@example.com',
//         'password' => 'password',
//         'password_confirmation' => 'password',
//     ]);

//     $this->assertAuthenticated();
//     $response->assertRedirect(RouteServiceProvider::HOME);
// });

test('registering a new user', function () {

    $roles = Roles::factory()->create();
    $role = Roles::select('id')->firstOrFail();
    $user = new User;

    $user ->first_name = 'John';
    $user ->last_name = 'Doe';
    $user ->surname = 'Smith';
    $user ->phone = '254700000011';
    $user ->email = 'seller@example.com';
    $user ->role_id = $role->id; 
    $user ->uuid = Str::uuid();
    $user ->password = Hash::make('password');

    $response = $user ->save();
    $response->toBeTruthy();
    $this->assertSame(1, User::all()->count());
    


});
