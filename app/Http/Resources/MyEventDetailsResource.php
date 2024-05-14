<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyEventDetailsResource extends JsonResource
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
            'image' => $this->image,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'date' => $this->date,
            'status' => $this->status,
            'location' => $this->location,
            'number_of_people' => $this->number_of_people,
            // 'payment' => array('message' => $this->payment->message, 'total' => $this->payment->total_price),
            'event' => $this->event?->name,
            'photographer' => array('name' => $this->photographer?->name, 'image' => $this->photographer->image),
            'buffet' => BuffetResource::collection($this->whenLoaded('buffets')),
            //'details' => EventDetailResource::collection($this->whenLoaded('details')),
            'details' => ReservationDetailResource::collection($this->whenLoaded('details')),

        ];
    }
}
