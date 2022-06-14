<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerMedicalReport extends Model
{
    protected $fillable = [
        'name',
        'image',
        'user_id',
        'player_id',
    ];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/players/medical_reports/'), $filename);
            $this->attributes['image'] =  'img/players/medical_reports/'.$filename;
        }
    }
}
