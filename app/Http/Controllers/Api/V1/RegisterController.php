<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Service\RegistrationService;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{

    public function __construct(RegistrationService $registrationService)
    {
        $this ->registrationService = $registrationService;
    }

    public function __invoke(RegisterUserRequest $request)
    {

        return $this->registrationService->register(new Request(
            $request ->validated()
        ));

    }
}
