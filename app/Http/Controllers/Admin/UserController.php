<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);

    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $user = User::create($request->all());
        //add role
        $user->assignRole($request->type);
        //add certificates
        if ($request->certs && count($request->certs)){
            for ($x = 0 ; $x < count($request->certs) ; $x++){
                $file = $request->file('certs')[$x];
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().mt_rand(1000,9999).'.'.$extension;
                $file->move(public_path('img/users/certifications/'), $filename);
                $cert = new UserCertificate();
                $cert->user_id = $user->id;
                $cert->file = 'img/users/certifications/'.$filename;
                $cert->save();
            }//end for
        }//end if

        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.users.index');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',[
            'user'=>$user,
        ]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',['user'=>$user]);
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
         $user->update($data);
        //add certificates
        if ($request->certs && count($request->certs)){
            for ($x = 0 ; $x < count($request->certs) ; $x++){
                $file = $request->file('certs')[$x];
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().mt_rand(1000,9999).'.'.$extension;
                $file->move(public_path('img/users/certifications/'), $filename);
                $cert = new UserCertificate();
                $cert->user_id = $user->id;
                $cert->file = 'img/users/certifications/'.$filename;
                $cert->save();
            }//end for
        }//end if
        Session::flash('message','Your work has been saved');
        return redirect()->back();

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    public function users_delete(Request $request){
        $ids = explode(',',$request->ids);
        foreach ($ids as $id){
            $user = User::findOrFail($id);
            $user->delete();
        }
        return redirect()->back();
    }//end users_delete

    public function bulk_activate(Request $request){
        $ids = explode(',',$request->ids);
        foreach ($ids as $id){
            $user = User::findOrFail($id);
            $user->admin_verified = 1;
            $user->save();
        }
        Session::flash('message','activated successfully');
        return redirect()->back();
    }//end bulk_activate
}
