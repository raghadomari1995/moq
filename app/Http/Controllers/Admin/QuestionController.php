<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    public function index($id)
    {
        $questions = Question::where('quiz_id',$id)->get();
        return view('admin.quizzes.questions.index',['questions'=>$questions]);

    }


    public function create()
    {
        return view('admin.quizzes.questions.create');
    }


    public function store($id,Request $request)
    {
        Question::create([
            'quiz_id'=>$id,
            'name'=>$request->name,
        ]);
        Session::flash('message','Your work has been saved');

        return redirect()->route('admin.questions.index',$id);

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
