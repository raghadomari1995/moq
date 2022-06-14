<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function about(){
        $p= Page::find(1);
        return view('admin.pages.about',['p'=>$p]);
    }

    public function aboutstore(Request $request){
        $p= Page::find(1);

        $p->translateOrNew('en')->text = $request->text['en'];
        $p->translateOrNew('ar')->text = $request->text['ar'];

        $p->save();
        
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }

    public function privcy(){
        $p= Page::find(2);
        return view('admin.pages.privcy',['p'=>$p]);
    }

    public function privcystore(Request $request){
        $p= Page::find(2);

        $p->translateOrNew('en')->text = $request->text['en'];
        $p->translateOrNew('ar')->text = $request->text['ar'];

        $p->save();
        
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }
}
