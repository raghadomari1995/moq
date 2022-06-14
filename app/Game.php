<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];

    protected $fillable = [
        'group_id',
        'user_id',
        'opponent_team',
        'city_id',
        'area',
        'address',
        'our_score',
        'opponent_score',
        'completed',
        'date',
    ];


    public function setGroupIdAttribute($value){
        if ($value){
            $this->attributes['group_id'] =  $value;
            $this->attributes['user_id'] =  auth()->id();
        }
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
