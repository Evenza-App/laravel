<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyEventResource extends JsonResource
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
            'image' => $this->event->image,
            'date' => $this->date,
            'status' => $this->status,
            'location' => $this->location,
            'event' => $this->event->name,
            //  'email' => $this->user->email
        ];
    }
}
