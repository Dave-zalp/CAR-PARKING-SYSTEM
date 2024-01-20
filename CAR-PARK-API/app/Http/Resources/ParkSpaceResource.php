<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkSpaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Space_name' => $this->Space_name,
            'Bill_per_minute' => $this->Bill_per_minute,
            'status' => $this->status,
        ];


    }
}
