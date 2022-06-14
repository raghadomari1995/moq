<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries(){
        $countries = Country::all();
        return response(['status' => config('global.success_code'), 'data' => CountryResource::collection($countries)]);

    }
    public function getCities($country_id){
        $cities = Country::find($country_id)->cities;
        return response(['status' => config('global.success_code'), 'data' => CityResource::collection($cities)]);

    }
}
