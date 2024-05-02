<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotographerResource extends JsonResource
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
            'image' => $this->image,
            'bio' => $this->bio,
            // 'numOfhours' => $this->numOfhours,
            'images' => $this->images,

        ];
    }
}
