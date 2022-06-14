<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = [
        'name',
        'image',
        'in_home',
        'parent_id',
       
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

    public function cats()
    {
        return $this->hasMany('App\Category')->get();
    }

    public function ads()
    {
        return $this->hasMany('App\Advertising')->where('status','1')->get();
    }
}
