<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            //   'birthDate' => $this->birthDate,
            'email' => $this->user->email,
            //'user' => $this->user->password,
            //  'user' => UserResource::collection($this->whenLoaded('user')),
            // 'user' => $this->user->password,
            // 'user'    => UserResource::collection($this->whenLoaded('user'))

        ];
    }
}
