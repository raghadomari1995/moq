<?php

namespace App\Http\Controllers;

use App\City;
use App\Group;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function getSelectValue(Request $request){
        switch ($request->type){
            case 'city':
                $data = City::where('country_id',$request->id)->get();
                break;
            case 'group':
                $data = Group::where('id',$request->id)->get();
                break;
            default:
                $data = [];
        }
        return response(['status' => 200, 'data' => $data]);
    }//end getSelectValue

}
