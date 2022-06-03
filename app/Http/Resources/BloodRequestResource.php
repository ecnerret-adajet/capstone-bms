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
            'blood_type_id' => $this->blood_type_id,
            'urgencyType' => $this->urgencyType,
            'urgency_id' => $this->urgency_id,
            'rhGroup' => $this->rhGroup,
            'rh_group_id' => $this->rh_group_id,
            'purpose' => $this->purpose,
            'purpose_id' => $this->purpose_id,
            'hospital' => $this->hospital,
            'hospital_id' => $this->hospital_id,
            'status' => $this->status,
            'attachment' => $this->attachment,
        ];
    }
}
