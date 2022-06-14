<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupUser;
use App\Http\Controllers\Controller;
use App\Player;
use App\PlayerEmergencyContact;
use App\PlayerSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Throwable;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{

    public function index()
    {
        $players = Player::all();
        return view('admin.players.index',['players'=>$players]);
    }

    public function create()
    {
        return view('admin.players.create');
    }


    public function store(Request $request)
    {

        try {

            DB::beginTransaction();

            $player = Player::create($request->all());

            foreach($request->contact_name as $key=>$name){

                $emergency_contact = new PlayerEmergencyContact();
                $emergency_contact->name = $name;
                $emergency_contact->phone = $request->contact_number[$key];
                $emergency_contact->relation = $request->contact_relation[$key];
                $emergency_contact->player_id = $player->id;
                $emergency_contact->save();

            }
            
            //assign player to group
            $group_user = new GroupUser();
            $group_user->group_id = $request->group_id;
            $group_user->groupable_id = $player->id;
            $group_user->groupable_type = get_class($player);
            $group_user->save();
            
            //add player subscription
            $subscription = new PlayerSubscription();
            $subscription->player_id = $player->id;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->save();
            //////////////////////////////////////

            DB::commit();

            Session::flash('message','Your work has been saved');
            return redirect()->route('admin.players.index');

        } catch (Throwable $e) {

            DB::rollBack();

            Session::flash('error','Your work has been not saved');
            return redirect()->back();
            
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('admin.players.edit',['player'=>$player]);
    }


    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->update($request->all());
        Session::flash('message','Your work has been saved');
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function addMembership( Request $request ){

        try {

            DB::beginTransaction();

            $player = Player::find($request->client_id);
            $player->membership_id = $request->type_id;
            $player->save();

            $subscription = new PlayerSubscription();
            $subscription->player_id = $request->client_id;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->save();

            DB::commit();
            
            Session::flash('message','Your work has been saved');
            return redirect()->back();

        } catch (Throwable $e) {

            DB::rollBack();

            Session::flash('error','Your work has been not saved');
            return redirect()->back();
            
        }
        

    }
}
