<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Note;
use App\NoteGroupable;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();


            if( !empty( $request->note ) ){

                //assign note 
                $note = new Note();
                $note->text = $request->note;
                $note->save();
                
                $note_att = new NoteGroupable();
                $note_att->note_id = $note->id;
                $note_att->note_groupable_id = $request->note_groupable_id;
                $note_att->note_groupable_type = $request->note_groupable_type;
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
