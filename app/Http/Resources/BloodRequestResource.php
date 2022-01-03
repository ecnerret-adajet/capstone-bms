<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodRequestResource extends JsonResource
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
            'patient_name' => $this->patient_name,
            'diagnosies' => $this->diagnosies,
            'bag_quantity' => $this->bag_quantity,
            'bloodType' => $this->bloodType,
            'urgencyType' => $this->urgencyType,
            'rhGroup' => $this->rhGroup,
            'purpose' => $this->purpose,
            'hospital' => $this->hospital,
            'status' => $this->status,
        ];
    }
}
