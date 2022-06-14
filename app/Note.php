<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    public function player_attendance(){
        return $this->morphedByMany(PlayerAttendance::class, 'note_groupable');
    }
    public function player(){
        return $this->morphedByMany(Player::class, 'note_groupable');
    }
}
