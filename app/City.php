<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];

    public function companies()
    {
        return $this->morphMany(Company::class, 'nationable');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

}
