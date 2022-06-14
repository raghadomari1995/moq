<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Category;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function category($id,Request $request){

        $cats = Category::find($id);
        return view('front.cats.index',['cats'=>$cats]);

    }

    public function ads($id,Request $request){

        $ads = Advertising::find($id);
        return view('front.ads.index',['ads'=>$ads]);

    }
    

    public function categories(Request $request){

        $cats = Category::all();
        return view('front.cats.index2',['cats'=>$cats]);

    }

    public function contact(Request $request){

        return view('front.page.contact');

    }
    public function about(Request $request){
        $p= Page::find(1);
        return view('front.page.about',['p'=>$p]);

    }

    public function privcy(Request $request){
        $p= Page::find(2);
        return view('front.page.privcy',['p'=>$p]);

    }

    public function add()
    {
        return view('front.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addads(Request $request)
    {
        $a =  Advertising::create($request->all());
        $a->status= '2';
        
        $a->save();
        Session::flash('message','Your work has been saved');
        return redirect()->back();
        
    }

    public function search(Request $request)
    {
        if( isset($request->group_id) ){
            $cats = Advertising::where('name','like', '%' . $request->s . '%')->where('city_id',$request->group_id)->where('status','1')->get();
        return view('front.user.search',['cats'=>$cats]);
        }
        $cats = Advertising::where('name','like', '%' . $request->s . '%')->where('status','1')->get();
        return view('front.user.search',['cats'=>$cats]);
    }

    public function account()
    {
        return view('front.account.main');
    }

    public function editaccount()
    {

        $user = Auth::user();
        return view('front.account.edit',['user'=>$user]);
    }

    public function editaccount2(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->all();
         $user->update($data);
        //add certificates
        
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }

    public function accountads()
    {
        
        $user = Auth::user();
        return view('front.account.ads',['user'=>$user]);
    }

    public function showuser()
    {
        
        $user = Auth::user();
        return view('front.account.show',['user'=>$user]);
    }
}
