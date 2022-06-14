<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'code',
        'email',
        'phone',
        'name',
        'date_of_birth',
        'image',
        'gender',
        'school_name',
        'neighborhood',
        'allergies',
        'medical_conditions',
        'hear_about_us',
        'city_id',
        'country_id',
        'membership_id',
        'address',
        'medical_conditions_description',
        'traning_location'
    ];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/players/'), $filename);
            $this->attributes['image'] =  'img/players/'.$filename;
        }
    }

    public function play_minutes()
    {
        return $this->hasMany(PlayerMinute::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(PlayerSubscription::class);
    }
    public function medical_reports()
    {
        return $this->hasMany(PlayerMedicalReport::class);
    }
    public function attendances()
    {
        return $this->hasMany(PlayerAttendance::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function groups(){
        return $this->morphToMany(Group::class, 'groupable');
    }//end groups

    public function getMinutesAttribute(){
        $total_minutes = 0;
        $total_seconds = 0;
                                  
        foreach($this->play_minutes as $play_minute){

            $total = calcMinutes($play_minute->in_minute,$play_minute->in_second,$play_minute->out_minute,$play_minute->out_second);
            $calc_total = calcTotal($total_minutes,$total_seconds,$total['minutes'],$total['seconds']);
            $total_minutes += $calc_total['minutes'];
            $total_seconds += $calc_total['seconds'];
            
        }
        return $total_minutes;
    }

    public function getGoalsAttribute(){
        $goals = 0;
        
                                  
        foreach($this->play_minutes as $play_minute){

            $goals += $play_minute->goals;
            
        }
        return $goals;
    }

    public function emergency_contact()
    {
        return $this->hasMany(PlayerEmergencyContact::class);
    }

    public function getGuardianNameAttribute(){
        
        return ( $this->emergency_contact()->first() ) ? $this->emergency_contact()->first()->name : '';
    }
    public function getGuardianRelationAttribute(){
        
        return $this->emergency_contact()->first()->relation;
    }
    public function notes(){
        return $this->morphToMany(Note::class, 'note_groupable');
    }
}
