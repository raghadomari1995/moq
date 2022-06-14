<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use App\GroupType;
use App\Http\Resources\GroupResource;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerGroupResource;
use App\Http\Resources\GroupTypeResource;
use App\Game;
use App\Http\Resources\GameResource;
use App\Traits\ResponseTrait;

class GroupController extends Controller
{
    use ResponseTrait;
    public function getGroups(){

        $groups = GroupType::all();
        if( !empty( $groups ) ){
            
            return $this->returnData($this->success,'data',GroupTypeResource::collection($groups));

        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));

    }


    public function getGroup($id){

        $group = Group::find($id);
        if( !empty( $group ) ){
            
            return $this->returnData($this->success,'data',GroupResource::make($group));
            
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));

    }

    public function getClients($id){

        $group = Group::find($id);
        if( !empty( $group->players ) ){
            
            return $this->returnData($this->success,'data',PlayerGroupResource::collection($group->players));
            
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function getCoachs($id){

        $group = Group::find($id);
        if( !empty( $group->users ) ){
            
            return $this->returnData($this->success,'data',PlayerResource::collection($group->users));
            
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));

    }

    public function getGames($id){

        $games = Game::where( 'group_id',$id )->get();
        if( !empty( $games ) ){
            
            return $this->returnData($this->success,'data',GameResource::collection($games));
            
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));

    }
}
