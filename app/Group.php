<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];

    public function users(){
        return $this->morphedByMany(User::class, 'groupable');
    }
    public function players(){
        return $this->morphedByMany(Player::class, 'groupable');
    }
    public function type(){
        return $this->belongsTo(GroupType::class,'grouptypes_id');
    }


}
