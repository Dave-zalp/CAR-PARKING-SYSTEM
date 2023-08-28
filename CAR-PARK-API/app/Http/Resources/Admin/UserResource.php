<?php

namespace App\Http\Resources\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'email' => $this->email,
            'Address1' => $this->Address1,
            'Address2' => $this->Address2,
            'kin_name' => $this->kin_name,
            'kin_number' => $this->kin_number,
        ];
    }
}
