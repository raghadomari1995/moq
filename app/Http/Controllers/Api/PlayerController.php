<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\GroupType;
use App\GroupUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Player;
use App\PlayerSubscription;
use Illuminate\Http\Request;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerAttendancesResource;
use App\Membership;
use App\Note;
use App\NoteGroupable;
use App\PlayerAttendance;
use Carbon\Carbon;
use Throwable;
use Illuminate\Support\Facades\DB;
use App\PlayerEmergencyContact;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    use ResponseTrait;

    public function getPlayers(){

        $players = Player::all();

        if( !empty( $players ) ){
            return $this->returnData($this->success,'data',PlayerResource::collection($players));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
    }

    public function getPlayer( $id ){

        $player = Player::find( $id );


        if( !empty( $player ) ){
            return $this->returnData($this->success,'data',PlayerResource::make($player));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function addClients( Request $request ){

        try {

            DB::beginTransaction();

            $player = Player::create($request->all());

            foreach($request->group_id as $key=>$group_id){

                //assign player to group
                $group_user = new GroupUser();
                $group_user->group_id = $group_id;
                $group_user->groupable_id = $player->id;
                $group_user->groupable_type = get_class($player);
                $group_user->save();
            
            }

            foreach($request->contact_name as $key=>$name){

                $emergency_contact = new PlayerEmergencyContact();
                $emergency_contact->name = $name;
                $emergency_contact->phone = $request->contact_number[$key];
                $emergency_contact->relation = $request->contact_relation[$key];
                $emergency_contact->player_id = $player->id;
                $emergency_contact->save();

            }

            //add player subscription
            //$subscription = new PlayerSubscription();
            //$subscription->player_id = $player->id;
            //$subscription->start_date = $request->start_date;
            //$subscription->end_date = $request->end_date;
            //$subscription->save();
            //////////////////////////////////////

            DB::commit();
            return $this->returnSuccessMessage($this->created,'Added');

            

        } catch (Throwable $e) {

            DB::rollBack();

            return  $this->returnError($this->exceptionCode,'not created');
            
        }

    }


    public function getAttendance( $id ){
        

        $player = Player::find( $id );
        
        if( ! empty ( $player->attendances ) ){
            return $this->returnData($this->success,'data',PlayerAttendancesResource::collection($player->attendances));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function addAttendance( $id, Request $request ){

        try {

            DB::beginTransaction();

            $report = new PlayerAttendance();
            $report->name = $request->name;
            $report->status = $request->status;
            $report->date = $request->date;
            $report->user_id = Auth::user()->id;
            $report->player_id = $request->client_id;
            $report->group_id = $request->group_id;
            $report->save();

            DB::commit();
            return $this->returnSuccessMessage($this->created,'Added');

            

        } catch (Throwable $e) {

            DB::rollBack();

            return  $this->returnError($this->exceptionCode,'not created');
            
        }
        

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
            return $this->returnSuccessMessage($this->created,'Added');

            

        } catch (Throwable $e) {

            DB::rollBack();

            return  $this->returnError($this->exceptionCode,'not created');
            
        }
        

    }

    public function getMemberships(){
        

        $types = Membership::all();
        
        if( ! empty ( $types ) ){
            return $this->returnData($this->success,'data',$types->toArray());
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));

    }

    public function getNotes( $id ){
        

        $player = Player::find( $id );
        
        if( ! empty ( $player->notes ) ){
            return $this->returnData($this->success,'data',NoteResource::collection($player->notes));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function addNote( $id, Request $request ){

        try {

            DB::beginTransaction();

            $player = Player::find($id);

            //assign note 
            $note = new Note();
            $note->text = $request->note;
            $note->save();
            
            $note_att = new NoteGroupable();
            $note_att->note_id = $note->id;
            $note_att->note_groupable_id = $player->id;
            $note_att->note_groupable_type = get_class($player);
            $note_att->save();

            DB::commit();
            return $this->returnSuccessMessage($this->created,'Added');

            

        } catch (Throwable $e) {

            DB::rollBack();

            return  $this->returnError($this->exceptionCode,'not created');
            
        }
        

    }
}