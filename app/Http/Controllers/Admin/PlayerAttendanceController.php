<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Note;
use App\NoteGroupable;
use App\PlayerAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Throwable;
use Illuminate\Support\Facades\DB;

class PlayerAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $report = PlayerAttendance::create($request->all());

            if( !empty( $request->note ) ){

                //assign note 
                $note = new Note();
                $note->text = $request->note;
                $note->save();
                
                $note_att = new NoteGroupable();
                $note_att->note_id = $note->id;
                $note_att->note_groupable_id = $report->id;
                $note_att->note_groupable_type = get_class($report);
                $note_att->save();

            }

            DB::commit();

            Session::flash('message','Your work has been saved');
            return redirect()->back();
        } catch (Throwable $e) {

            DB::rollBack();

            Session::flash('error','Your work has been not saved');
            return redirect()->back();
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atten = PlayerAttendance::findOrFail($id);
        return view('admin.players.notes',[
            'atten'=>$atten,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
