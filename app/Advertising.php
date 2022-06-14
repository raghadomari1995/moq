<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{

    protected $fillable = [
        'name',
        'price',
        'status',
        'status2',
        'type',
        'image',
        'des',
        'year',
        'color',
        'user_id',
        'category_id',
        'city_id',
        'region',
        'note',
       
    ];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/ads/'), $filename);
            $this->attributes['image'] =  'img/ads/'.$filename;
        }
    }

    public function status(){
        if( $this->status == '1' ){
            return __('Active');
        }

        if( $this->status == '2' ){
            return __('Inactive');
        }

        if( $this->status == '3' ){
            return __('Pending');
        }

        if( $this->status == '4' ){
            return __('Cancelled');
        }
    }

    public function status2(){
        if( $this->status2 == '1' ){
            return __('New');
        }

        if( $this->status2 == '2' ){
            return __('Used');
        }

    }

    public function type(){
        if( $this->type == '1' ){
            return __('Sale');
        }

        if( $this->type == '2' ){
            return __('Swap');
        }

    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->first()->name;
    }

    public function user2()
    {
        return $this->belongsTo('App\User', 'user_id')->first();
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id')->first()->translate(app()->getLocale())->name;
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id')->first()->translate(app()->getLocale())->name;
    }

    public function getTypefrontAttribute(){
        
        return ( $this->type == 1) ? __('Sale') : __('Swap') ;
    }

    public function country()
    {
        return $this->belongsTo('App\City', 'city_id')->first()->country;
    }
}
