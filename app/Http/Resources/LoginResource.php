<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this['token'],
            'id' => $this['user']['id'],
            'first_name' => $this['user']['first_name'],
            'last_name' => $this['user']['last_name'],
            'email' => $this['user']['email'],
        ];

        
    }
}
