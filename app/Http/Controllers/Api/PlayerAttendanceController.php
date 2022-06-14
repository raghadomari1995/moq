<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Http\Resources\PlayerAttendancesResource;
use App\Note;
use App\NoteGroupable;
use App\PlayerAttendance;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class PlayerAttendanceController extends Controller
{
    use ResponseTrait;

    public function getAttendance( $id ){
        

        $atten = PlayerAttendance::find( $id );
        
        if( ! empty ( $atten ) ){
            return $this->returnData($this->success,'data',PlayerAttendancesResource::make($atten));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function getNotes( $id ){
        

        $atten = PlayerAttendance::find( $id );
        
        if( ! empty ( $atten->notes ) ){
            return $this->returnData($this->success,'data',NoteResource::make($atten->notes));
        }

        return  $this->returnError($this->notFound,trans('messages.no_result_found'));
        

    }

    public function addNote( $id, Request $request ){

        try {

            DB::beginTransaction();

            $report = PlayerAttendance::find($id);

            //assign note 
            $note = new Note();
            $note->text = $request->note;
            $note->save();
            
            $note_att = new NoteGroupable();
            $note_att->note_id = $note->id;
            $note_att->note_groupable_id = $report->id;
            $note_att->note_groupable_type = get_class($report);
            $note_att->save();

            DB::commit();
            return $this->returnSuccessMessage($this->created,'Added');

            

        } catch (Throwable $e) {

            DB::rollBack();

            return  $this->returnError($this->exceptionCode,'not created');
            
        }
        

    }

    public function updateAttendance( $id, Request $request ){

        try {
            $report =  PlayerAttendance::find($id);
            $report->name = $request->name;
            $report->status = $request->status;
            $report->date = $request->date;
            $report->user_id = Auth::user()->id;
            $report->player_id = $request->client_id;
            $report->group_id = $request->group_id;
            $report->save();

            return $this->returnSuccessMessage($this->created,'updated');

        } catch (Throwable $e) {

            return  $this->returnError($this->exceptionCode,'not updated');
            
        }
        

    }
}
