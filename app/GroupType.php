<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    public function groups(){
        return $this->hasMany(Group::class , 'grouptypes_id');
    }
}
