<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //app()->setLocale('en');
        $advertising = Advertising::all();
        return view('admin.advertising.index',['advertising'=>$advertising]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertising.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a =  Advertising::create($request->all());
        $a->status= '1';
        
        $a->save();
        Session::flash('message','Your work has been saved');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Advertising::findOrFail($id);
        return view('admin.advertising.edit',['player'=>$player]);
    }


    public function update(Request $request, $id)
    {
        $player = Advertising::findOrFail($id);
        $player->update($request->all());
        $player->save();
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Advertising::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
