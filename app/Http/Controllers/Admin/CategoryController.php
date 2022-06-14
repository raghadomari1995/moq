<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locales = config('translatable.locales');
        $game = new Category($request->except('name'));
        $game->save();
        foreach ($locales as $locale) {
            $game->translateOrNew($locale)->name = $request->name[$locale];
        }
        $game->save();
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Category::findOrFail($id);
        return view('admin.category.edit',['player'=>$player]);
    }


    public function update(Request $request, $id)
    {
        $locales = config('translatable.locales');
        $player = Category::findOrFail($id);
        $player->update($request->except('name'));
        foreach ($locales as $locale) {
            $player->translateOrNew($locale)->name = $request->name[$locale];
        }
        $player->save();
        
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
