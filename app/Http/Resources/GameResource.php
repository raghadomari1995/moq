<?php

namespace App\Http\Resources;

use App\GameTrial;
use App\ObjectiveLevel;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'opponent_team' => $this->opponent_team,
            'area' => $this->area,
            'address' => $this->address,
            'date' => $this->date,
            'our_score' => $this->our_score,
            'opponent_score' => $this->opponent_score,
            'completed' => $this->completed,
            'date' => $this->date,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
