<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupUser;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index',['groups'=>$groups]);
    }

    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {
        $locales = config('translatable.locales');

        $group = new Group();
        $group->age = $request->age;
        $group->grouptypes_id = $request->type;
        $group->name = $request->name;
        $group->save();
//        //assign croup to user (coach)
//        $group_user = new GroupUser();
//        $group_user->group_id = $group->id;
//        $group_user->groupable_id = auth()->id();
//        $group_user->groupable_type = get_class(auth()->user());
//        $group_user->save();
//        foreach ($locales as $locale) {
//            $group->translateOrNew($locale)->name = Lang::get('messages.under',[],$locale).' '.$request->name.' '.Lang::get('messages.years',[],$locale);
//        }

        $group->save();
        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.groups.index');
    }
    public function add_users($id){
        $group = Group::findOrFail($id)->users->pluck('id')->toArray();
        $users = $users = User::Coachs()->get();
        return view('admin.groups.add_users',['users'=>$users,'group'=>$group]);
    }//end add_user
    public function view_users($id){
        $group = Group::findOrFail($id);
        $users = $group->users;
        return view('admin.users.index',['users'=>$users]);
    }//end view_users
    public function save_users($id,Request $request){
        $group = Group::findOrFail($id);
        $group->users()->detach();
        if( $request->users ){

            foreach ($request->users as $user){
                $group_users = new GroupUser();
                $group_users->group_id = $id;
                $group_users->groupable_id  = $user;
                $group_users->groupable_type = get_class(auth()->user());
                $group_users->save();
            }
            
        }
        
        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.groups.index');
    }//end add_user

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
