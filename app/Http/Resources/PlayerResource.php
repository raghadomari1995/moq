<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'guardian_name'  => $this->guardian_name,
            'guardian_relation'  => $this->guardian_relation,
            'date_of_birth'  => $this->date_of_birth,
            'nationality'  => $this->country->nationality,
            'gender'  => $this->gender,
            'groups'  => GroupResource::collection($this->groups),
            'total_minutes'  => $this->minutes,
            'total_goals'  => $this->goals,
            'email'  => $this->email,
            'address'  => $this->address,
            'school'  => $this->school,
            'emergency_contact'  => EmergencyContactResource::collection($this->emergency_contact->skip(1)),
            'last_note'=> NoteResource::make($this->notes->last()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
