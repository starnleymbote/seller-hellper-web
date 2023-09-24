<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterUser extends JsonResource
{
    // protected $request;
    // protected $message;
    // protected $statusCode;
    
    // public function __construct($request, ?string $message, ?int $statusCode)
    // {

    //     $this->message = $message;
    //     $this->statusCode = $statusCode;
    // }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            
        ];
      
    }

    // public function with(Request $request): array
    // {
    //     return [
            
    //         'message' => $this->message,
    //         'status' => $this->statusCode,
        
    //     ];

    // }
}
