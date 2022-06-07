<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hospital_name' => $this->hospital_name,
            'address' => $this->address,
            'user' => $this->user ? $this->user : 'N/A',
            'name' => $this->user ? $this->user->name : null,
            'email' => $this->user ? $this->user->email : null,
            'role_id' => $this->user ? $this->user->roles->pluck('id')[0] : null,
        ];
    }
}
