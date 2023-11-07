<?php

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Service\RegistrationService;
use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

describe('user registration', function () {


        test("register using registration service", function () {

            $roles = Roles::factory()->create();
            $role = Roles::select('id')->firstOrFail();
            $registrationService = new RegistrationService();
            
            $user = $registrationService->register(new Request([
                
                'first_name' => 'John',
                'last_name' => 'Doe',
                'surname' => 'Smith',
                'phone' => '254700000011',
                'email' => 'seller@example.com',
                'role_id' => $role->id,
                'password' => 'password',

            ]));

        $this->assertSame(1, User::all()->count());

        });

        test("register using valid mail", function () {

            $roles = Roles::factory()->create();
            $role = Roles::select('id')->firstOrFail();
            $registrationService = new RegistrationService();
            
            $user = $registrationService->register(new Request([
                
                'first_name' => 'John',
                'last_name' => 'Doe',
                'surname' => 'Smith',
                'phone' => '254700000011',
                'email' => 'seller@example.com',
                'role_id' => $role->id,
                'password' => 'password',

            ]));

            
        $this->assertSame(1, User::all()->count());

        });

        test("register using invalid mail", function () {

            $roles = Roles::factory()->create();
            $role = Roles::select('id')->firstOrFail();
            $registrationService = new RegistrationService();
            
            $user = $registrationService->register(new Request([
                
                'first_name' => 'John',
                'last_name' => 'Doe',
                'surname' => 'Smith',
                'phone' => '254700000011',
                'role_id' => $role->id,
                'password' => 'password',

            ]));
            
            expect([
                
                'first_name' => 'John',
                'last_name' => 'Doe',
                'surname' => 'Smith',
                'phone' => '254700000011',
                'role_id' => $role->id,
                'password' => 'password',

            ])->not->toContain('email');

        $this->assertSame(0, User::all()->count());

        });


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
