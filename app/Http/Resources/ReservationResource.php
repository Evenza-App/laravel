<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //  return parent::toArray($request);
        return ([
            'id' => $this->id,
            'image' => $this->image,
            'status' => $this->status,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'date' => $this->date,
            'numberOfPeople' => $this->numberOfPeople,
            'event' => $this->event->name,
            'photographer' => $this->photographer->name,
            'user' => $this->user->email
        ]);
    }
}
