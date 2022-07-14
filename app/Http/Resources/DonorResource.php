<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonorResource extends JsonResource
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
            'first_name' => $this->first_name,
            'gender_id' => $this->gender_id,
            'rh_group_id' => $this->rh_group_id,
            'blood_type_id' => $this->blood_type_id,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'address' => $this->address,
            'height' => $this->height,
            'weight' => $this->weight,
            'bloodType' => $this->bloodType,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'rhGroup' => $this->rhGroup,
            'name' => $this->user ? $this->user->name : null,
            'email' => $this->user ? $this->user->email : null,
            'role_id' => $this->user ? $this->user->roles->pluck('id')[0] : null,
        ];
    }
}
