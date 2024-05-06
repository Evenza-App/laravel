<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuffetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'ingredients' => $this->ingredients,
            'type' => $this->type,
            'image' => $this->image,
            // 'price' => $this->price,
            'category' => $this->category->name,

        ];
    }
}
