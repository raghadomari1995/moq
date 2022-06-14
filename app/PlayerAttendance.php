<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerAttendance extends Model
{
    protected $fillable = [
        'date',
        'status',
        'user_id',
        'player_id',
        'group_id',
        'name',
    ];
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notes(){
        return $this->morphToMany(Note::class, 'note_groupable');
    }
}
