<?php

namespace App\Http\Resources;

use App\GroupType;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GroupResource;

class GroupTypeResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'groups' =>GroupResource::collection($this->groups),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}
