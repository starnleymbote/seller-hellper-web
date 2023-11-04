<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Service\RegistrationService;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct(RegistrationService $registrationService)
    {
        $this ->registrationService = $registrationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('role:id,name')->select('uuid', 'profile_image', 'first_name', 'last_name', 'surname', 'phone', 'email', 'role_id')->get();
        
        return view('users.list')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $request)
    {

       $this->registrationService->register(new Request(
            $request ->validated()
        ));
        
        //return redirect()->back()->withErrors($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('users.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
