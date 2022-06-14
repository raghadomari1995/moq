<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'type',
        'active',
        'device_token',
        'description',
        'date_of_birth',
        'gender',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups(){
        return $this->morphToMany(Group::class, 'groupable');
    }//end companies
    public function certifications(){
        return $this->hasMany(UserCertificate::class);
    }

    public function ads(){
        return $this->hasMany(Advertising::class);
    }

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/users/'), $filename);
            $this->attributes['image'] =  'img/users/'.$filename;
        }
    }
    public function setPasswordAttribute($value){
        if ($value){
            $this->attributes['password'] = bcrypt($value);
        }else{
            unset($this->attributes['password']);
        }
    }

    public function scopeCoachs($query){
 
        return $query->where( [ ['type' ,'!=', 'admin'],['type' ,'!=', 'super_admin'] ] );
 
    }
    public function city(){
        return $this->belongsTo(City::class);
    }


}
