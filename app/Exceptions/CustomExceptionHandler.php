<?php

namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

use Exception;

class CustomExceptionHandler extends Exception
{
    protected $dontReport = [
        // ...
    ];

    protected $dontFlash = [

    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
            // Customize the validation error response format
            return response()->json([
                'data' => [],
                'message' => 'The given data was invalid.',
                'errors' => $exception->errors(),
            ], 422);
     
        return parent::render($request, $exception);
    }
}
